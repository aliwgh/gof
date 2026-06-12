<?php
/**
 * =========================================================================================
 * SATO LUXURY IP GENERATOR - STARFIELD EDITION
 * =========================================================================================
 * Version: 7.0.0 Ultra Premium
 * Architecture: PHP Monolithic / Vanilla JS / Advanced Glassmorphism / Particle Engine
 * Description: Exclusive, aesthetic, and interactive IP generator for SATO.
 * Mobile-First, No Terminals, No VPN Configs, Pure UI/UX Magic.
 * =========================================================================================
 */

session_start();

// =========================================================================================
// 1. ADVANCED DATABASE (Emojis, Tags, Luxury Details)
// =========================================================================================

$satoDatabase = [
    'eu' => [
        ['country' => 'Germany', 'city' => 'Frankfurt', 'flag' => '', 'emoji' => '', 'tag' => 'Ultra Clean', 'range' => '185.156.73.', 'color' => '#ffcc00'],
        ['country' => 'Germany', 'city' => 'Berlin', 'flag' => '', 'emoji' => '', 'tag' => 'High Speed', 'range' => '164.90.18.', 'color' => '#ffcc00'],
        ['country' => 'Netherlands', 'city' => 'Amsterdam', 'flag' => '', 'emoji' => '', 'tag' => 'Premium', 'range' => '194.156.98.', 'color' => '#ff6600'],
        ['country' => 'France', 'city' => 'Paris', 'flag' => '', 'emoji' => '', 'tag' => 'Luxury', 'range' => '178.32.200.', 'color' => '#0055ff'],
        ['country' => 'United Kingdom', 'city' => 'London', 'flag' => '', 'emoji' => '', 'tag' => 'Royal', 'range' => '146.70.182.', 'color' => '#ff0033'],
        ['country' => 'Sweden', 'city' => 'Stockholm', 'flag' => '', 'emoji' => '', 'tag' => 'Nordic Clean', 'range' => '37.120.210.', 'color' => '#00ccff'],
        ['country' => 'Finland', 'city' => 'Helsinki', 'flag' => '', 'emoji' => '', 'tag' => 'Ice Cold', 'range' => '185.244.35.', 'color' => '#ffffff'],
        ['country' => 'Switzerland', 'city' => 'Zurich', 'flag' => '', 'emoji' => '', 'tag' => 'Bank Grade', 'range' => '151.236.18.', 'color' => '#ff3333'],
        ['country' => 'Italy', 'city' => 'Milan', 'flag' => '', 'emoji' => '', 'tag' => 'Classic', 'range' => '62.149.50.', 'color' => '#00cc66'],
        ['country' => 'Spain', 'city' => 'Madrid', 'flag' => '', 'emoji' => '', 'tag' => 'Sunny', 'range' => '84.17.45.', 'color' => '#ffcc00']
    ],
    'na' => [
        ['country' => 'USA', 'city' => 'New York', 'flag' => '', 'emoji' => '', 'tag' => 'Wall Street', 'range' => '3.12.55.', 'color' => '#0055ff'],
        ['country' => 'USA', 'city' => 'Los Angeles', 'flag' => '', 'emoji' => '', 'tag' => 'Hollywood', 'range' => '198.55.10.', 'color' => '#ff3366'],
        ['country' => 'USA', 'city' => 'Miami', 'flag' => '', 'emoji' => '', 'tag' => 'Ocean', 'range' => '45.66.12.', 'color' => '#00ffcc'],
        ['country' => 'Canada', 'city' => 'Toronto', 'flag' => '', 'emoji' => '', 'tag' => 'Maple', 'range' => '5.199.130.', 'color' => '#ff0000']
    ],
    'as' => [
        ['country' => 'Japan', 'city' => 'Tokyo', 'flag' => '', 'emoji' => '', 'tag' => 'Samurai', 'range' => '45.76.200.', 'color' => '#ff0055'],
        ['country' => 'Singapore', 'city' => 'Singapore', 'flag' => '', 'emoji' => '', 'tag' => 'Lion City', 'range' => '128.199.20.', 'color' => '#ffcc00'],
        ['country' => 'UAE', 'city' => 'Dubai', 'flag' => '', 'emoji' => '', 'tag' => 'Desert Gold', 'range' => '94.200.15.', 'color' => '#ffaa00'],
        ['country' => 'Turkey', 'city' => 'Istanbul', 'flag' => '', 'emoji' => '', 'tag' => 'Bosphorus', 'range' => '91.132.124.', 'color' => '#ff3333']
    ]
];

// Flatten for easy random picking if no region specified
$allNodes = [];
foreach ($satoDatabase as $region => $nodes) {
    foreach ($nodes as $node) {
        $node['region'] = $region;
        $allNodes[] = $node;
    }
}

// =========================================================================================
// 2. API ENDPOINTS
// =========================================================================================

if (isset($_GET['api']) && $_GET['api'] === 'generate') {
    header('Content-Type: application/json');
    
    // Simulate generation delay for typewriter and particle effect timing
    usleep(800000); 
    
    $region = $_GET['region'] ?? 'all';
    $sourcePool = ($region === 'all') ? $allNodes : ($satoDatabase[$region] ?? $allNodes);
    
    $selectedNode = $sourcePool[array_rand($sourcePool)];
    
    // Generate actual IP string
    $fullIp = $selectedNode['range'] . mt_rand(1, 254);
    $selectedNode['generated_ip'] = $fullIp;
    
    echo json_encode([
        'status' => 'success',
        'data' => $selectedNode
    ]);
    exit;
}

// =========================================================================================
// 3. FRONTEND UI/UX (HTML, CSS, JS Integration)
// =========================================================================================
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#03040b">
    <title>SATO | Luxury IP Generator</title>
    
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400;700&display=swap" rel="stylesheet">

    <style>
        /* =========================================================================================
           CSS VARIABLES & RESET
           ========================================================================================= */
        :root {
            --bg-deep: #020308;
            --sato-cyan: #00f0ff;
            --sato-purple: #7000ff;
            --sato-pink: #ff0055;
            --sato-gold: #ffcc00;
            
            --glass-bg: rgba(10, 12, 20, 0.4);
            --glass-border: rgba(255, 255, 255, 0.05);
            --glass-glow: rgba(0, 240, 255, 0.15);
            
            --text-main: #ffffff;
            --text-muted: #8b9bb4;
            
            --font-fa: 'Vazirmatn', sans-serif;
            --font-en: 'JetBrains Mono', monospace;
            
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 16px;
            --radius-sm: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
            user-select: none;
        }

        body {
            font-family: var(--font-fa);
            background-color: var(--bg-deep);
            color: var(--text-main);
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* =========================================================================================
           BACKGROUND EFFECTS (Starfield & Mouse Follower)
           ========================================================================================= */
        #space {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -3;
            overflow: hidden;
            background: radial-gradient(circle at center, #0a0b16 0%, #020308 100%);
        }

        .stars {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: transparent;
        }

        /* Generated via JS for performance, styled here */
        .star {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            animation: twinkle linear infinite;
        }

        @keyframes twinkle {
            0% { opacity: 0.2; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); box-shadow: 0 0 8px #fff; }
            100% { opacity: 0.2; transform: scale(0.8); }
        }

        /* Mouse Follower Glow */
        #cursorGlow {
            position: fixed;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(112, 0, 255, 0.15) 0%, rgba(0, 240, 255, 0.05) 40%, transparent 70%);
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: -1;
            transition: opacity 0.3s;
            filter: blur(40px);
        }

        /* =========================================================================================
           MAIN LAYOUT & CARDS (Glassmorphism + Floating)
           ========================================================================================= */
        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* 3D Floating Effect Wrapper */
        .tilt-wrapper {
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius-xl);
            padding: 30px 20px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.1s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Ambient internal glow */
        .glass-card::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: radial-gradient(circle at 50% 0%, var(--glass-glow), transparent 60%);
            pointer-events: none;
            opacity: 0.5;
            transition: opacity 0.5s;
        }

        /* =========================================================================================
           BRANDING & HEADER
           ========================================================================================= */
        .sato-logo-wrapper {
            position: relative;
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            transform-style: preserve-3d;
        }

        .sato-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid transparent;
            border-top-color: var(--sato-cyan);
            border-bottom-color: var(--sato-purple);
            animation: spin 8s linear infinite;
        }

        .sato-ring::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            border-radius: 50%;
            border: 2px solid transparent;
            border-left-color: var(--sato-pink);
            border-right-color: var(--sato-gold);
            animation: spin 4s linear infinite reverse;
        }

        .sato-logo-text {
            font-family: var(--font-en);
            font-weight: 700;
            font-size: 24px;
            background: linear-gradient(135deg, #fff, var(--sato-cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            z-index: 2;
            text-shadow: 0 0 20px rgba(0, 240, 255, 0.5);
        }

        .sato-title {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .sato-subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-family: var(--font-en);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sato-subtitle::before, .sato-subtitle::after {
            content: '';
            height: 1px;
            width: 20px;
            background: var(--text-muted);
            opacity: 0.3;
        }

        @keyframes spin { 100% { transform: rotate(360deg); } }

        /* =========================================================================================
           IP DISPLAY AREA (Matrix Typewriter + Particles)
           ========================================================================================= */
        .ip-display-container {
            width: 100%;
            background: rgba(0,0,0,0.6);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: var(--radius-lg);
            padding: 30px 20px;
            text-align: center;
            position: relative;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 25px;
        }

        .ip-display-container:hover {
            border-color: var(--sato-cyan);
            box-shadow: 0 10px 30px rgba(0, 240, 255, 0.1);
            transform: translateY(-2px);
        }

        .ip-display-container:active {
            transform: scale(0.96);
        }

        /* Freshness Indicator */
        .freshness-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0, 255, 170, 0.15);
            border: 1px solid rgba(0, 255, 170, 0.3);
            color: #00ffaa;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.65rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 5px;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s ease;
        }

        .freshness-badge.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .freshness-dot {
            width: 6px;
            height: 6px;
            background: #00ffaa;
            border-radius: 50%;
            box-shadow: 0 0 8px #00ffaa;
            animation: pulse-dot 1.5s infinite;
        }

        @keyframes pulse-dot {
            0% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(0.8); opacity: 0.5; }
        }

        /* The actual IP Text */
        .ip-text {
            font-family: var(--font-en);
            font-size: 2.2rem;
            font-weight: 100;
            color: var(--text-main);
            letter-spacing: 2px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 0 0 15px rgba(255,255,255,0.3);
        }

        .cursor {
            display: inline-block;
            width: 10px;
            height: 35px;
            background: var(--sato-cyan);
            margin-left: 5px;
            animation: blink 1s infinite;
            box-shadow: 0 0 10px var(--sato-cyan);
        }

        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

        .copy-hint {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            opacity: 0.6;
            transition: opacity 0.3s;
        }
        .ip-display-container:hover .copy-hint { opacity: 1; }

        /* Meta Data (Country, Emoji, Tag) */
        .meta-data-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
            height: 30px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.5s ease;
        }

        .meta-data-row.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .meta-item {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .meta-emoji { font-size: 1.1rem; }

        /* =========================================================================================
           ACTION BUTTON (Glowing, Heartbeat)
           ========================================================================================= */
        .btn-generate {
            width: 100%;
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.1), rgba(112, 0, 255, 0.1));
            border: 1px solid rgba(0, 240, 255, 0.3);
            color: var(--text-main);
            padding: 18px;
            border-radius: var(--radius-md);
            font-family: var(--font-fa);
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: softPulseBtn 3s infinite ease-in-out;
            z-index: 1;
        }

        .btn-generate::before {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
            z-index: -1;
        }

        .btn-generate:hover {
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.2), rgba(112, 0, 255, 0.2));
            border-color: var(--sato-cyan);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.3);
            transform: translateY(-2px);
        }

        .btn-generate:hover::before { left: 100%; }

        .btn-generate:active { transform: scale(0.98); }

        @keyframes softPulseBtn {
            0% { box-shadow: 0 0 10px rgba(0, 240, 255, 0.1); }
            50% { box-shadow: 0 0 25px rgba(0, 240, 255, 0.25); }
            100% { box-shadow: 0 0 10px rgba(0, 240, 255, 0.1); }
        }

        .btn-icon {
            width: 24px;
            height: 24px;
            fill: none;
            stroke: var(--sato-cyan);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* =========================================================================================
           REGION SELECTOR (Minimalist)
           ========================================================================================= */
        .region-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            width: 100%;
        }

        .region-btn {
            flex: 1;
            background: rgba(0,0,0,0.3);
            border: 1px solid var(--glass-border);
            color: var(--text-muted);
            padding: 10px 0;
            border-radius: var(--radius-sm);
            font-family: var(--font-fa);
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .region-btn.active {
            background: rgba(0, 240, 255, 0.1);
            border-color: var(--sato-cyan);
            color: var(--sato-cyan);
            box-shadow: inset 0 0 10px rgba(0, 240, 255, 0.1);
        }

        /* =========================================================================================
           PARTICLE BURST SYSTEM & TOASTER
           ========================================================================================= */
        .particle {
            position: absolute;
            pointer-events: none;
            border-radius: 50%;
            z-index: 100;
        }

        .toaster {
            position: fixed;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(10, 12, 20, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid var(--sato-cyan);
            color: #fff;
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 30px rgba(0, 240, 255, 0.2);
            transition: bottom 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 1000;
        }

        .toaster.show { bottom: 40px; }
        
        .toaster-emoji { font-size: 1.2rem; }

        /* =========================================================================================
           MEDIA QUERIES (Mobile First Enhancements)
           ========================================================================================= */
        @media (max-width: 400px) {
            .ip-text { font-size: 1.8rem; }
            .meta-data-row { flex-wrap: wrap; height: auto; }
        }
    </style>
</head>
<body>

<svg style="display:none;">
    <defs>
        <symbol id="icon-magic" viewBox="0 0 24 24">
            <path d="M2.5 21.5l14-14M17 3l4 4M21 15v4a2 2 0 0 1-2 2h-4M3 9V5a2 2 0 0 1 2-2h4"/>
        </symbol>
        <symbol id="icon-copy" viewBox="0 0 24 24">
            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
        </symbol>
    </defs>
</svg>

<div id="space"><div class="stars" id="starsContainer"></div></div>
<div id="cursorGlow"></div>

<div class="container tilt-wrapper" id="tiltWrapper">
    <div class="glass-card" id="mainCard">
        
        <div class="sato-logo-wrapper">
            <div class="sato-ring"></div>
            <div class="sato-logo-text">S</div>
        </div>
        <h1 class="sato-title">SATO</h1>
        <div class="sato-subtitle">Luxury Generator</div>

        <div class="region-selector">
            <button class="region-btn active" data-region="all"> </button>
            <button class="region-btn" data-region="eu"> </button>
            <button class="region-btn" data-region="na"> </button>
            <button class="region-btn" data-region="as"> </button>
        </div>

        <div class="ip-display-container" id="ipContainer">
            <div class="freshness-badge" id="freshBadge">
                <div class="freshness-dot"></div>
                <span id="freshText"> </span>
            </div>

            <div class="ip-text" id="ipDisplay">
                <span id="ipString">---.---.---.---</span><span class="cursor" id="cursor"></span>
            </div>
            
            <div class="copy-hint">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><use href="#icon-copy"></use></svg>
                    
            </div>

            <div class="meta-data-row" id="metaRow">
                <div class="meta-item"><span class="meta-emoji" id="metaFlag"></span> <span id="metaCountry"></span></div>
                <div class="meta-item"><span class="meta-emoji" id="metaEmoji"></span> <span id="metaTag">SATO Core</span></div>
            </div>
        </div>

        <button class="btn-generate" id="btnGen">
            <svg class="btn-icon"><use href="#icon-magic"></use></svg>
              
        </button>

    </div>
</div>

<div class="toaster" id="toaster">
    <span class="toaster-emoji"></span>
    <span id="toasterMsg">    !</span>
</div>

<script>
/**
 * SATO Luxury Engine
 * Handles all UI interactions, typing effects, particles, and API calls.
 */
const SatoEngine = (function() {
    
    // UI Elements
    const DOM = {
        space: document.getElementById('space'),
        starsContainer: document.getElementById('starsContainer'),
        cursorGlow: document.getElementById('cursorGlow'),
        tiltWrapper: document.getElementById('tiltWrapper'),
        mainCard: document.getElementById('mainCard'),
        ipContainer: document.getElementById('ipContainer'),
        ipString: document.getElementById('ipString'),
        cursor: document.getElementById('cursor'),
        freshBadge: document.getElementById('freshBadge'),
        freshText: document.getElementById('freshText'),
        metaRow: document.getElementById('metaRow'),
        metaFlag: document.getElementById('metaFlag'),
        metaCountry: document.getElementById('metaCountry'),
        metaEmoji: document.getElementById('metaEmoji'),
        metaTag: document.getElementById('metaTag'),
        btnGen: document.getElementById('btnGen'),
        regionBtns: document.querySelectorAll('.region-btn'),
        toaster: document.getElementById('toaster'),
        toasterMsg: document.getElementById('toasterMsg')
    };

    // State
    let state = {
        isGenerating: false,
        currentIp: '',
        currentColor: '#00f0ff',
        selectedRegion: 'all'
    };

    // --- 1. Sound Engine (Base64 Minimal Click) ---
    // A very short, elegant "tick" sound generated via base64 to remain single-file.
    const clickSoundBase64 = "data:audio/wav;base64,UklGRigAAABXQVZFZm10IBAAAAABAAEARKwAAIhYAQACABAAZGF0YQQAAAD//wEA/f8="; 
    // Expanded synthetic click for a slightly better pop (generated minimal wav)
    const popSoundBase64 = "data:audio/wav;base64,UklGRjIAAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YRAAAAB/gH+Af4B/gH+Af4B/gH8=";
    let audioCtx = null;

    function playClick() {
        try {
            if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.connect(gain);
            gain.connect(audioCtx.destination);
            
            osc.type = 'sine';
            osc.frequency.setValueAtTime(800, audioCtx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(100, audioCtx.currentTime + 0.05);
            
            gain.gain.setValueAtTime(0.3, audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.05);
            
            osc.start();
            osc.stop(audioCtx.currentTime + 0.05);
        } catch(e) { /* Ignore audio context errors if browser blocks */ }
    }

    function playSuccess() {
        try {
            if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.connect(gain);
            gain.connect(audioCtx.destination);
            
            osc.type = 'triangle';
            osc.frequency.setValueAtTime(1200, audioCtx.currentTime);
            osc.frequency.linearRampToValueAtTime(2000, audioCtx.currentTime + 0.1);
            
            gain.gain.setValueAtTime(0.2, audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.2);
            
            osc.start();
            osc.stop(audioCtx.currentTime + 0.2);
        } catch(e) {}
    }

    // --- 2. Visual Effects Engine ---
    
    // Starfield Generator
    function initStarfield() {
        const count = window.innerWidth < 600 ? 50 : 150;
        let html = '';
        for(let i=0; i<count; i++) {
            let x = Math.random() * 100;
            let y = Math.random() * 100;
            let size = Math.random() * 2;
            let dur = Math.random() * 3 + 1;
            let delay = Math.random() * 2;
            html += `<div class="star" style="left:${x}%; top:${y}%; width:${size}px; height:${size}px; animation-duration:${dur}s; animation-delay:${delay}s;"></div>`;
        }
        DOM.starsContainer.innerHTML = html;
    }

    // Mouse Follower
    function initMouseFollower() {
        document.addEventListener('mousemove', (e) => {
            DOM.cursorGlow.style.left = e.clientX + 'px';
            DOM.cursorGlow.style.top = e.clientY + 'px';
        });
        
        // Touch devices fallback
        document.addEventListener('touchmove', (e) => {
            DOM.cursorGlow.style.left = e.touches[0].clientX + 'px';
            DOM.cursorGlow.style.top = e.touches[0].clientY + 'px';
        }, {passive: true});
    }

    // 3D Tilt Effect on Card
    function initTilt() {
        const card = DOM.mainCard;
        const wrapper = DOM.tiltWrapper;
        
        wrapper.addEventListener('mousemove', (e) => {
            if(window.innerWidth < 768) return; // Disable on mobile for performance
            const rect = wrapper.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = ((y - centerY) / centerY) * -5; // max 5 deg
            const rotateY = ((x - centerX) / centerX) * 5;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        wrapper.addEventListener('mouseleave', () => {
            card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg)`;
        });
    }

    // Particle Burst System (When copying IP)
    function createParticleBurst(x, y, color) {
        const amount = 25;
        for (let i = 0; i < amount; i++) {
            createParticle(x, y, color);
        }
    }

    function createParticle(x, y, color) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        document.body.appendChild(particle);
        
        const size = Math.random() * 6 + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.background = color;
        particle.style.boxShadow = `0 0 ${size*2}px ${color}`;
        
        const destinationX = x + (Math.random() - 0.5) * 150;
        const destinationY = y + (Math.random() - 0.5) * 150;
        const rotation = Math.random() * 360;
        
        const animation = particle.animate([
            {
                transform: `translate(${x}px, ${y}px) rotate(0deg)`,
                opacity: 1
            },
            {
                transform: `translate(${destinationX}px, ${destinationY}px) rotate(${rotation}deg)`,
                opacity: 0
            }
        ], {
            duration: Math.random() * 500 + 500,
            easing: 'cubic-bezier(0, .9, .57, 1)',
            fill: 'forwards'
        });
        
        animation.onfinish = () => particle.remove();
    }

    // --- 3. Core Logic ---

    // Typewriter effect
    async function typeWriter(text, element, speed = 40) {
        element.textContent = '';
        playClick();
        for (let i = 0; i < text.length; i++) {
            element.textContent += text.charAt(i);
            if(i % 3 === 0) playClick(); // play click every few chars
            await new Promise(r => setTimeout(r, speed));
        }
    }

    // Show Toaster
    function showToast(msg) {
        DOM.toasterMsg.textContent = msg;
        DOM.toaster.classList.add('show');
        setTimeout(() => DOM.toaster.classList.remove('show'), 3000);
    }

    // Handle Copy
    function handleCopy(e) {
        if (!state.currentIp || state.isGenerating) return;
        
        navigator.clipboard.writeText(state.currentIp).then(() => {
            playSuccess();
            showToast('    !');
            
            // Get click coordinates for particles
            let x, y;
            if (e.clientX) {
                x = e.clientX;
                y = e.clientY;
            } else if (e.touches && e.touches.length > 0) {
                x = e.touches[0].clientX;
                y = e.touches[0].clientY;
            } else {
                const rect = DOM.ipContainer.getBoundingClientRect();
                x = rect.left + rect.width / 2;
                y = rect.top + rect.height / 2;
            }
            
            createParticleBurst(x, y, state.currentColor);
            
            // Visual feedback on container
            DOM.ipContainer.style.borderColor = state.currentColor;
            DOM.ipContainer.style.boxShadow = `0 0 40px ${state.currentColor}40`;
            setTimeout(() => {
                DOM.ipContainer.style.borderColor = '';
                DOM.ipContainer.style.boxShadow = '';
            }, 500);
        });
    }

    // Main Generate Function
    async function generateIP() {
        if (state.isGenerating) return;
        state.isGenerating = true;
        playClick();
        
        // Reset UI
        DOM.freshBadge.classList.remove('visible');
        DOM.metaRow.classList.remove('visible');
        DOM.btnGen.style.opacity = '0.5';
        DOM.btnGen.style.transform = 'scale(0.98)';
        
        // Glitch effect on old IP
        DOM.ipString.textContent = '......';
        
        try {
            const res = await fetch(`?api=generate&region=${state.selectedRegion}`);
            const json = await res.json();
            
            if (json.status === 'success') {
                const data = json.data;
                state.currentIp = data.generated_ip;
                state.currentColor = data.color || '#00f0ff';
                
                // Update Meta
                DOM.metaFlag.textContent = data.flag;
                DOM.metaCountry.textContent = `${data.country} - ${data.city}`;
                DOM.metaEmoji.textContent = data.emoji;
                DOM.metaTag.textContent = data.tag;
                DOM.metaTag.style.color = state.currentColor;
                
                // Type new IP
                await typeWriter(state.currentIp, DOM.ipString, 30);
                
                // Show new UI elements
                DOM.freshText.textContent = 'Ultra Clean ';
                DOM.freshBadge.style.color = state.currentColor;
                DOM.freshBadge.style.borderColor = state.currentColor;
                DOM.freshBadge.querySelector('.freshness-dot').style.background = state.currentColor;
                DOM.freshBadge.querySelector('.freshness-dot').style.boxShadow = `0 0 8px ${state.currentColor}`;
                
                DOM.freshBadge.classList.add('visible');
                DOM.metaRow.classList.add('visible');
                
                // Colorize cursor
                DOM.cursor.style.backgroundColor = state.currentColor;
                DOM.cursor.style.boxShadow = `0 0 10px ${state.currentColor}`;
                
                playSuccess();
            }
        } catch (e) {
            DOM.ipString.textContent = ' ';
        } finally {
            DOM.btnGen.style.opacity = '1';
            DOM.btnGen.style.transform = 'none';
            state.isGenerating = false;
        }
    }

    // Setup Region Listeners
    function setupRegions() {
        DOM.regionBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                playClick();
                DOM.regionBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                state.selectedRegion = btn.dataset.region;
            });
        });
    }

    // Initialize all modules
    function init() {
        initStarfield();
        initMouseFollower();
        initTilt();
        setupRegions();
        
        // Event Listeners
        DOM.btnGen.addEventListener('click', generateIP);
        DOM.ipContainer.addEventListener('click', handleCopy);
        
        // Auto-run once on load for dynamic feel
        setTimeout(generateIP, 500);
        
        // Handle window resize for starfield
        window.addEventListener('resize', () => {
            clearTimeout(window.resizeTimer);
            window.resizeTimer = setTimeout(initStarfield, 200);
        });
    }

    return { init };

})();

// Bootstrap
document.addEventListener('DOMContentLoaded', SatoEngine.init);

</script>
</body>
</html>
