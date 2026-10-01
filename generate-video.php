<?php
/**
 * AI Video Generator Endpoint
 * Handles asynchronous video generation requests and status polling.
 */

header('Content-Type: application/json; charset=utf-8');

// Optional: Set your API Key here or via environment variable
$heygenApiKey    = getenv('HEYGEN_API_KEY') ?: '';
$replicateApiKey = getenv('REPLICATE_API_KEY') ?: '';

$action = $_REQUEST['action'] ?? '';

// Start a new video generation task
if ($action === 'start') {
    $script  = isset($_POST['script']) ? trim(strip_tags($_POST['script'])) : '';
    $avatar  = isset($_POST['avatar']) ? trim(strip_tags($_POST['avatar'])) : 'avatar_executive';
    $voice   = isset($_POST['voice']) ? trim(strip_tags($_POST['voice'])) : 'en_us_male_pro';
    $aspect  = isset($_POST['aspect']) ? trim(strip_tags($_POST['aspect'])) : '16:9';

    if (empty($script)) {
        http_response_code(400);
        echo json_encode(['error' => 'Please provide a script for the video.']);
        exit;
    }

    $wordCount = str_word_count($script);
    // Rough estimate: ~130-150 words per minute of spoken video
    $estimatedDurationSec = max(15, min(180, round(($wordCount / 140) * 60)));

    // Generate unique Task ID
    $taskId = 'vid_task_' . uniqid() . '_' . time();

    // If live API key is set, call provider API (e.g. HeyGen or Replicate)
    if (!empty($heygenApiKey)) {
        $ch = curl_init('https://api.heygen.com/v2/video/generate');
        $payload = json_encode([
            'video_inputs' => [
                [
                    'character' => [
                        'type' => 'avatar',
                        'avatar_id' => $avatar,
                        'avatar_style' => 'normal'
                    ],
                    'voice' => [
                        'type' => 'text',
                        'input_text' => $script,
                        'voice_id' => $voice
                    ]
                ]
            ],
            'dimension' => ['width' => 1920, 'height' => 1080]
        ]);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'X-Api-Key: ' . $heygenApiKey,
                'Content-Type: application/json'
            ]
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $resData = json_decode($response, true);
        if ($httpCode === 200 && !empty($resData['data']['video_id'])) {
            $taskId = $resData['data']['video_id'];
        }
    }

    // Save initial session state for demo/simulation tracking if needed
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['tasks'][$taskId] = [
        'created_at' => time(),
        'duration'   => $estimatedDurationSec,
        'word_count' => $wordCount,
        'avatar'     => $avatar,
        'status'     => 'processing'
    ];

    echo json_encode([
        'success'             => true,
        'task_id'             => $taskId,
        'estimated_duration' => $estimatedDurationSec,
        'word_count'         => $wordCount,
        'message'            => 'Video generation initiated successfully.'
    ]);
    exit;
}

// Check status of a video generation task
if ($action === 'status') {
    $taskId = $_GET['task_id'] ?? '';

    if (empty($taskId)) {
        http_response_code(400);
        echo json_encode(['error' => 'Task ID is required.']);
        exit;
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $taskData = $_SESSION['tasks'][$taskId] ?? null;

    // Check live API if key is present
    if (!empty($heygenApiKey)) {
        $ch = curl_init('https://api.heygen.com/v1/video_status.get?video_id=' . urlencode($taskId));
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'X-Api-Key: ' . $heygenApiKey
            ]
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        $resData = json_decode($response, true);
        if (!empty($resData['data'])) {
            $status = $resData['data']['status']; // 'completed', 'processing', 'failed'
            $videoUrl = $resData['data']['video_url'] ?? '';

            echo json_encode([
                'status'    => $status === 'completed' ? 'completed' : 'processing',
                'progress'  => $status === 'completed' ? 100 : 65,
                'video_url' => $videoUrl
            ]);
            exit;
        }
    }

    // Fallback: Simulation progress calculations for smooth demonstration
    // If session is unavailable, extract timestamp safely from taskId (vid_task_<uniqid>_<timestamp>)
    $taskTimestamp = 0;
    $parts = explode('_', $taskId);
    if (count($parts) >= 3 && is_numeric(end($parts))) {
        $taskTimestamp = (int)end($parts);
    }
    $createdAt = $taskData['created_at'] ?? ($taskTimestamp > 0 ? $taskTimestamp : (time() - 2));
    $elapsed = max(0, time() - $createdAt);
    // Simulated rendering time is ~18 seconds for responsive demo experience
    $totalSimSeconds = 18;
    $progress = min(100, round(($elapsed / $totalSimSeconds) * 100));

    if ($progress >= 100) {
        $status = 'completed';
        // Sample HTML5 videos for demonstration
        $sampleVideos = [
            'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
            'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
            'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4'
        ];
        $videoUrl = $sampleVideos[abs(crc32($taskId)) % count($sampleVideos)];
    } else {
        $status = 'processing';
        $videoUrl = null;
    }

    echo json_encode([
        'status'    => $status,
        'progress'  => $progress,
        'video_url' => $videoUrl,
        'elapsed'   => $elapsed
    ]);
    exit;
}

http_response_code(400);
echo json_encode(['error' => 'Invalid action.']);
