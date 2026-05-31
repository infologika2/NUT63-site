<?php
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Покерный клуб HATC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:italic&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --background: 220 15% 4%;
            --gold: 41 53% 57%;
            --gold-light: 41 68% 65%;
            --gold-dark: 41 58% 30%;
            --font-display: 'Instrument Serif', serif;
            --font-body: 'Inter', sans-serif;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background-color: hsl(var(--background));
            color: white;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        section[id] {
            scroll-margin-top: 48px;
        }

        h1,
        h2,
        h3,
        h4,
        .font-display {
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
            opacity: 0.12;
            filter: grayscale(80%) sepia(40%) hue-rotate(5deg) brightness(0.5);
        }

        .liquid-glass {
            background: rgba(10, 10, 15, 0.45);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(201, 164, 92, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(201, 164, 92, 0.1);
            position: relative;
            overflow: hidden;
        }

        @keyframes hero-float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes hero-glow {

            0%,
            100% {
                filter: drop-shadow(0 0 20px rgba(201, 164, 92, 0.3));
            }

            50% {
                filter: drop-shadow(0 0 60px rgba(201, 164, 92, 0.8));
            }
        }

        .hero-logo-main {
            animation: hero-float 6s ease-in-out infinite, hero-glow 4s ease-in-out infinite;
            position: relative;
            z-index: 20;
        }

        @keyframes fade-rise {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-rise {
            animation: fade-rise 1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .delay-1 {
            animation-delay: 0.3s;
        }

        .delay-2 {
            animation-delay: 0.6s;
        }

        .btn-gold {
            background: linear-gradient(135deg, hsl(var(--gold)), hsl(var(--gold-dark)));
            color: #050505;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(201, 164, 92, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            box-shadow: 0 8px 30px rgba(201, 164, 92, 0.5);
            transform: scale(1.04);
            color: #000;
        }

        .card-custom {
            background-color: rgba(15, 15, 20, 0.85);
            backdrop-filter: blur(10px);
            padding: 30px 20px;
            border-radius: 16px;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            border: 1px solid rgba(201, 164, 92, 0.15);
            transition: transform 0.4s ease, border-color 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .card-custom::before {
            content: '';
            position: absolute;
            inset: 0;
            background-color: rgba(10, 10, 15, 0.85);
            /* Затемнение поверх картинки */
            z-index: 0;
            transition: background-color 0.4s ease;
        }

        .card-custom:hover::before {
            background-color: rgba(10, 10, 15, 0.65);
            /* Легкое просветление при наведении */
        }

        .card-custom>* {
            position: relative;
            z-index: 10;
        }

        .card-custom:hover {
            transform: translateY(-8px);
            border-color: rgba(201, 164, 92, 0.6);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: hsl(var(--background));
        }

        ::-webkit-scrollbar-thumb {
            background: hsl(var(--gold-dark));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: hsl(var(--gold));
        }

        /* Card hover effects */
        .card {
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .card:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            border-color: rgba(212, 175, 55, 0.6);
        }

        .card img {
            transition: transform 0.5s ease;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .card-title {
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        .card:hover .card-title {
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.6);
        }

        .card-title {
            min-height: 40px;
            display: flex;
            align-items: flex-start;
        }

        .card .card-title {
            margin-top: 0;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .card h3,
        .card-title {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .card>*:first-child {
            margin-top: 0 !important;
        }

        .card-content {
            padding-top: 24px !important;
        }

        /* FAQ Accordion Custom Styles */
        .faq-item {
            transition: all 0.3s ease;
        }

        .faq-question {
            transition: color 0.2s ease;
        }

        .faq-item.active .faq-question-text {
            color: hsl(var(--gold));
        }

        .faq-answer-inner {
            transition: opacity 0.3s ease, transform 0.3s ease;
            opacity: 0;
            transform: translateY(-8px);
        }

        .faq-item.active .faq-answer-inner {
            opacity: 1;
            transform: translateY(0);
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .site-nav {
            position: absolute;
            top: 14px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 50;
            width: min(1180px, calc(100% - 32px));
            min-height: 64px;
            margin: 0;
            padding: 8px 12px 8px 16px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 24px;
            background: rgba(3, 3, 4, .78);
            border: 1px solid rgba(201, 164, 92, .18);
            border-radius: 999px;
            box-shadow: 0 18px 55px rgba(0, 0, 0, .38);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .site-logo {
            width: 48px;
            height: 48px;
            display: block;
            object-fit: contain;
        }

        .site-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(18px, 3vw, 38px);
        }

        .site-links a {
            color: rgba(255, 255, 255, .62);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            text-decoration: none;
            transition: color .25s ease;
        }

        .site-links a:hover,
        .site-links a:first-child {
            color: hsl(var(--gold-light));
        }

        .telegram-nav {
            position: relative;
            justify-self: end;
        }

        .telegram-link {
            position: relative;
            min-height: 42px;
            padding: 0 20px 0 16px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            border-radius: 999px;
            background:
                linear-gradient(135deg, rgba(35, 136, 207, .26), rgba(5, 12, 18, .78)),
                rgba(35, 136, 207, .16);
            border: 1px solid rgba(89, 190, 255, .48);
            color: #ffffff;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
            text-decoration: none;
            white-space: nowrap;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .04) inset,
                0 16px 42px rgba(35, 136, 207, .2),
                0 0 34px rgba(35, 136, 207, .16);
            overflow: hidden;
            transition: transform .25s ease, background .25s ease, border-color .25s ease, box-shadow .25s ease;
        }

        .telegram-link::after {
            content: "";
            position: absolute;
            inset: -55% auto -55% -50%;
            width: 34%;
            transform: skewX(-20deg);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .42), transparent);
            animation: telegram-link-shine 4.6s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes telegram-link-shine {
            0%,
            58% {
                left: -50%;
            }

            100% {
                left: 118%;
            }
        }

        .telegram-link:hover {
            transform: translateY(-2px);
            background:
                linear-gradient(135deg, rgba(61, 181, 255, .36), rgba(5, 12, 18, .88)),
                rgba(35, 136, 207, .28);
            border-color: rgba(127, 211, 255, .82);
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .08) inset,
                0 20px 58px rgba(35, 136, 207, .28),
                0 0 42px rgba(35, 136, 207, .26);
        }

        .telegram-link svg {
            width: 18px;
            height: 18px;
            flex: 0 0 auto;
            filter: drop-shadow(0 0 10px rgba(127, 211, 255, .45));
        }

        .telegram-popover {
            position: absolute;
            top: calc(100% + 14px);
            right: 0;
            width: 240px;
            padding: 12px;
            border: 1px solid rgba(89, 190, 255, .35);
            border-radius: 22px;
            background: rgba(5, 9, 13, .94);
            box-shadow: 0 28px 70px rgba(0, 0, 0, .55), 0 0 42px rgba(35, 136, 207, .18);
            text-decoration: none;
            opacity: 0;
            transform: translateY(8px) scale(.98);
            pointer-events: none;
            transition: opacity .22s ease, transform .22s ease;
        }

        .telegram-popover::before {
            content: "";
            position: absolute;
            top: -7px;
            right: 34px;
            width: 14px;
            height: 14px;
            transform: rotate(45deg);
            border-left: 1px solid rgba(89, 190, 255, .28);
            border-top: 1px solid rgba(89, 190, 255, .28);
            background: rgba(5, 9, 13, .94);
        }

        .telegram-nav:hover .telegram-popover,
        .telegram-nav:focus-within .telegram-popover {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .telegram-popover img {
            width: 100%;
            display: block;
            border-radius: 16px;
            background: #fff;
        }

        .telegram-popover span {
            display: block;
            margin-top: 9px;
            color: rgba(255, 255, 255, .72);
            font-size: 11px;
            font-weight: 700;
            line-height: 1.35;
            text-align: center;
        }

        .hero-section {
            position: relative;
            min-height: 100vh;
            min-height: 100svh;
            display: grid;
            grid-template-columns: minmax(460px, .88fr) minmax(460px, 1.12fr);
            align-items: center;
            gap: clamp(28px, 4vw, 68px);
            padding: clamp(112px, 14vh, 150px) clamp(40px, 6vw, 116px) clamp(30px, 6vh, 64px);
            overflow: hidden;
            background: linear-gradient(90deg, #020202 0%, #050505 42%, rgba(5, 5, 5, 0.78) 64%, #020202 100%);
            isolation: isolate;
        }

        .hero-section::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background:
                linear-gradient(90deg, #020202 0%, rgba(2, 2, 2, 0.93) 34%, rgba(2, 2, 2, 0.18) 62%, #020202 100%),
                linear-gradient(0deg, #020202 0%, rgba(2, 2, 2, 0) 28%, rgba(2, 2, 2, 0) 72%, #020202 100%);
            pointer-events: none;
        }

        .hero-copy {
            position: relative;
            z-index: 2;
            max-width: 900px;
            text-align: left;
        }

        .hero-copy::before {
            content: "";
            position: absolute;
            inset: -42px -72px -34px -46px;
            z-index: -1;
            background:
                radial-gradient(ellipse at 35% 42%, rgba(201, 164, 92, .12), transparent 46%),
                linear-gradient(90deg, rgba(0, 0, 0, .72), rgba(0, 0, 0, .36) 58%, transparent);
            filter: blur(2px);
            pointer-events: none;
        }

        .hero-kicker {
            display: inline-flex;
            margin-bottom: clamp(14px, 2vh, 22px);
            color: hsl(var(--gold-light));
            font-size: clamp(11px, .75vw, 13px);
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .hero-title {
            max-width: min(1120px, 72vw);
            margin: 0;
            color: #ffffff;
            font-size: clamp(68px, 6.25vw, 124px) !important;
            font-weight: 800;
            line-height: .9 !important;
            letter-spacing: 0;
            text-shadow:
                0 22px 74px rgba(0, 0, 0, .95),
                0 0 28px rgba(255, 255, 255, .1);
        }

        .hero-title span {
            color: hsl(var(--gold));
            text-shadow:
                0 18px 60px rgba(0, 0, 0, .9),
                0 0 26px rgba(201, 164, 92, .28);
        }

        .hero-text {
            max-width: 620px;
            margin-top: clamp(18px, 3vh, 28px);
            color: rgba(255, 255, 255, .72);
            font-size: clamp(16px, 1.08vw, 20px);
            line-height: 1.55;
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: clamp(16px, 2.6vh, 24px);
        }

        .hero-points span {
            min-height: 26px;
            display: inline-flex;
            align-items: center;
            padding: 0 9px;
            border: 1px solid rgba(201, 164, 92, .26);
            border-radius: 999px;
            background: rgba(255, 255, 255, .035);
            color: rgba(255, 255, 255, .7);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .hero-actions {
            justify-content: flex-start;
            margin-top: clamp(22px, 4vh, 36px);
        }

        .hero-actions .btn-gold {
            position: relative;
            min-height: 44px;
            max-width: max-content;
            padding: 0 28px !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 12px !important;
            line-height: 1.2;
            letter-spacing: .12em;
            text-decoration: none;
        }

        .hero-actions .btn-gold::after {
            content: "";
            position: absolute;
            inset: -40% auto -40% -55%;
            width: 42%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .45), transparent);
            transform: skewX(-18deg);
            animation: button-shine 4.8s ease-in-out infinite;
        }

        @keyframes button-shine {
            0%,
            58% {
                left: -55%;
            }

            100% {
                left: 120%;
            }
        }

        .hero-jaguar {
            position: absolute;
            inset: 0 0 0 39%;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .hero-jaguar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 46% 54%;
            opacity: .96;
            filter: contrast(1.08) saturate(1.08) brightness(.92);
            -webkit-mask-image: linear-gradient(90deg, transparent 0%, #000 18%, #000 86%, transparent 100%);
            mask-image: linear-gradient(90deg, transparent 0%, #000 18%, #000 86%, transparent 100%);
        }

        .registration-modal {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: rgba(0, 0, 0, .78);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .registration-modal.is-open {
            display: flex;
        }

        .registration-dialog {
            width: min(520px, 100%);
            border: 1px solid rgba(201, 164, 92, .28);
            border-radius: 28px;
            background: #08080a;
            box-shadow: 0 30px 90px rgba(0, 0, 0, .65);
            overflow: hidden;
        }

        .registration-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            padding: 28px 28px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .registration-kicker {
            display: block;
            margin-bottom: 8px;
            color: hsl(var(--gold-light));
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .2em;
            text-transform: uppercase;
        }

        .registration-title {
            margin: 0;
            color: #fff;
            font-size: 28px;
            line-height: 1.15;
        }

        .registration-close {
            width: 38px;
            height: 38px;
            flex: 0 0 auto;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 999px;
            background: rgba(255, 255, 255, .04);
            color: #fff;
            cursor: pointer;
            font-size: 22px;
            line-height: 1;
        }

        .registration-form {
            display: grid;
            gap: 16px;
            padding: 24px 28px 28px;
        }

        .registration-field span {
            display: block;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, .62);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .registration-field input {
            width: 100%;
            min-height: 50px;
            padding: 0 16px;
            border: 1px solid rgba(201, 164, 92, .22);
            border-radius: 14px;
            background: rgba(255, 255, 255, .045);
            color: #fff;
            font: inherit;
            outline: none;
        }

        .voice-input-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 50px;
            gap: 10px;
            align-items: center;
        }

        .voice-button {
            width: 50px;
            height: 50px;
            border: 1px solid rgba(201, 164, 92, .32);
            border-radius: 14px;
            background: rgba(201, 164, 92, .1);
            color: hsl(var(--gold-light));
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
            transition: background .25s ease, border-color .25s ease, color .25s ease, transform .25s ease;
        }

        .voice-button:hover,
        .voice-button.is-listening {
            background: hsl(var(--gold));
            border-color: hsl(var(--gold));
            color: #050505;
        }

        .voice-button.is-listening {
            transform: scale(1.04);
        }

        .voice-button:disabled {
            cursor: not-allowed;
            opacity: .45;
        }

        .footer-logo {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        main {
            position: relative;
            z-index: 20;
            margin-top: 40px;
            padding: 112px 24px 80px;
            border-top: 1px solid rgba(201, 164, 92, .2);
            background: hsla(var(--background), .95);
            box-shadow: 0 -30px 60px rgba(0, 0, 0, .9);
        }

        main section {
            max-width: 1280px;
            margin: 0 auto 128px;
        }

        #rating {
            margin-bottom: 260px;
        }

        main section>div:first-child {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 48px;
        }

        main section>div:first-child h2 {
            margin: 0;
            color: #fff;
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.1;
        }

        main section>div:first-child h2 span,
        .text-\[hsl\(var\(--gold\)\)\] {
            color: hsl(var(--gold));
        }

        main section>div:first-child>div {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, hsl(var(--gold)), transparent);
        }

        #about>p {
            margin: 0 0 48px;
            padding-left: 24px;
            border-left: 3px solid hsl(var(--gold));
            color: rgb(156, 163, 175);
            font-size: 20px;
            line-height: 1.55;
        }

        #about>.grid,
        #events-grid {
            display: grid;
            gap: 24px;
        }

        #about>.grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        #events-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 32px;
        }

        #events-grid>.liquid-glass,
        #rating>.liquid-glass {
            padding: 32px;
            border-radius: 24px;
            border-top: 3px solid hsl(var(--gold));
        }

        #events-grid>article {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        #events-grid ul {
            margin: 0;
            padding-left: 0;
            list-style: none;
        }

        #events-grid li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 12px;
        }

        .event-card {
            position: relative;
            min-height: 100%;
            padding: 24px;
            border: 1px solid rgba(201, 164, 92, .18);
            border-radius: 24px;
            background:
                radial-gradient(circle at 18% 0%, rgba(201, 164, 92, .13), transparent 34%),
                linear-gradient(180deg, rgba(12, 12, 16, .96), rgba(5, 5, 8, .98));
            box-shadow: 0 24px 70px rgba(0, 0, 0, .34);
            overflow: hidden;
            transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease;
        }

        .event-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-top: 3px solid hsl(var(--gold));
            opacity: .95;
            pointer-events: none;
        }

        .event-card:hover {
            transform: translateY(-6px);
            border-color: rgba(201, 164, 92, .42);
            box-shadow: 0 30px 86px rgba(0, 0, 0, .48);
        }

        .event-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 18px;
        }

        .event-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: hsl(var(--gold-light));
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .event-status::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
            box-shadow: 0 0 16px currentColor;
        }

        .event-status.is-finished {
            color: rgba(255, 255, 255, .36);
        }

        .event-title {
            margin: 0;
            color: hsl(var(--gold));
            font-size: clamp(25px, 2.1vw, 34px);
            line-height: 1.08;
        }

        .event-date {
            margin: 16px 0 0;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: rgba(255, 255, 255, .86);
            font-size: 15px;
            line-height: 1.45;
        }

        .event-type {
            isolation: isolate;
            position: relative;
            margin-top: 16px;
            padding: 15px 17px;
            border: 1px solid rgba(201, 164, 92, .22);
            border-radius: 18px;
            background:
                radial-gradient(circle at 12% 0%, rgba(255, 224, 158, .24), transparent 48%),
                linear-gradient(135deg, rgba(201, 164, 92, .16), rgba(255, 255, 255, .035) 46%, rgba(201, 164, 92, .1)),
                rgba(201, 164, 92, .06);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .08),
                inset 0 -22px 44px rgba(201, 164, 92, .05),
                0 14px 42px rgba(201, 164, 92, .08);
            overflow: hidden;
        }

        .event-type::before {
            content: "";
            position: absolute;
            inset: -80% auto -80% -34%;
            width: 32%;
            transform: rotate(18deg);
            background: linear-gradient(90deg, transparent, rgba(255, 245, 215, .28), transparent);
            animation: eventTypeShine 4.2s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        .event-type::after {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 17px;
            border: 1px solid rgba(255, 235, 188, .08);
            pointer-events: none;
            z-index: -1;
        }

        @keyframes eventTypeShine {
            0%,
            52% {
                transform: translateX(0) rotate(18deg);
                opacity: 0;
            }

            62% {
                opacity: 1;
            }

            82%,
            100% {
                transform: translateX(520%) rotate(18deg);
                opacity: 0;
            }
        }

        .event-type-value {
            display: block;
            color: #fff6dc;
            text-shadow: 0 0 18px rgba(201, 164, 92, .26);
            font-size: clamp(20px, 1.7vw, 27px);
            font-weight: 800;
            line-height: 1.12;
        }

        .event-details {
            display: grid;
            gap: 8px;
            margin: 16px 0 0;
        }

        .event-detail {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            color: rgba(255, 255, 255, .52);
            font-size: 12px;
            line-height: 1.45;
        }

        .event-detail::before {
            content: "";
            width: 6px;
            height: 6px;
            margin-top: 6px;
            flex: 0 0 auto;
            border-radius: 50%;
            background: hsl(var(--gold));
        }

        .telegram-registration {
            margin-top: 34px;
            padding: clamp(22px, 3vw, 34px);
            display: grid;
            grid-template-columns: minmax(0, 1fr) 148px;
            gap: 28px;
            align-items: center;
            border: 1px solid rgba(35, 136, 207, .32);
            border-radius: 28px;
            background:
                radial-gradient(circle at 12% 20%, rgba(35, 136, 207, .18), transparent 28%),
                linear-gradient(135deg, rgba(9, 16, 24, .94), rgba(6, 7, 10, .94));
            box-shadow: 0 24px 70px rgba(0, 0, 0, .42);
        }

        .telegram-registration-kicker {
            display: inline-flex;
            margin-bottom: 10px;
            color: #7fc9ff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .telegram-registration-title {
            margin: 0;
            color: #fff;
            font-size: clamp(24px, 2.6vw, 36px);
            line-height: 1.1;
        }

        .telegram-registration-text {
            max-width: 640px;
            margin: 12px 0 0;
            color: rgba(255, 255, 255, .64);
            line-height: 1.6;
        }

        .telegram-registration-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .telegram-bot-link {
            min-height: 44px;
            padding: 0 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid rgba(35, 136, 207, .55);
            border-radius: 999px;
            background: rgba(35, 136, 207, .18);
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .12em;
            text-decoration: none;
            text-transform: uppercase;
            box-shadow: 0 0 28px rgba(35, 136, 207, .16);
            transition: transform .25s ease, background .25s ease, border-color .25s ease;
        }

        .telegram-bot-link:hover {
            transform: translateY(-1px);
            background: rgba(35, 136, 207, .28);
            border-color: rgba(127, 201, 255, .82);
        }

        .telegram-bot-link svg {
            width: 17px;
            height: 17px;
            flex: 0 0 auto;
        }

        .telegram-qr {
            justify-self: end;
            width: 148px;
            padding: 10px;
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 20px 44px rgba(0, 0, 0, .34);
        }

        .telegram-qr img {
            width: 100%;
            display: block;
            border-radius: 16px;
        }

        .telegram-qr-copy {
            display: inline;
        }

        #faq .space-y-5 {
            display: grid;
            gap: 20px;
        }

        .faq-item {
            padding: 24px;
            border: 1px solid rgba(201, 164, 92, .16);
            border-radius: 18px;
            cursor: pointer;
        }

        .faq-question {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .faq-question-text {
            color: #fff;
            font-size: 20px;
            line-height: 1.35;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
        }

        .faq-answer-inner {
            margin-top: 8px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: rgb(209, 213, 219);
            line-height: 1.7;
        }

        #rating .overflow-x-auto {
            overflow-x: auto;
        }

        #rating table {
            width: 100%;
            border-collapse: collapse;
        }

        #rating th,
        #rating td {
            padding: 16px;
            text-align: left;
        }

        #rating th:not(:nth-child(2)),
        #rating td:not(:nth-child(2)) {
            text-align: center;
        }

        footer {
            position: relative;
            z-index: 30;
            padding: 22px 24px 28px;
            border-top: 1px solid rgba(201, 164, 92, .24);
            background: rgba(3, 3, 5, .96);
            color: rgba(255, 255, 255, .58);
        }

        footer>div {
            position: relative;
            max-width: 1180px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }

        .footer-block {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
        }

        .footer-kicker {
            display: inline-flex;
            color: rgba(201, 164, 92, .84);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .14em;
            line-height: 1;
            text-transform: uppercase;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 10px;
            flex: 0 0 auto;
        }

        .footer-brand-text {
            display: grid;
            gap: 1px;
        }

        .footer-brand-name {
            color: #fff;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .footer-brand-note {
            color: rgba(255, 255, 255, .48);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .footer-address {
            justify-content: center;
            flex: 0 0 auto;
            text-align: left;
        }

        .footer-address p,
        .footer-description p {
            margin: 0;
        }

        .footer-address p {
            color: rgba(255, 255, 255, .68);
            font-size: 12px;
            font-weight: 400;
            line-height: 1.35;
            white-space: nowrap;
        }

        .footer-description {
            justify-content: flex-end;
            flex: 1 1 420px;
            text-align: right;
        }

        .footer-description p {
            color: rgba(255, 255, 255, .62);
            font-size: 12px;
            font-weight: 400;
            line-height: 1.35;
            margin-left: 10px;
            text-align: left;
        }

        footer a {
            color: inherit;
        }

        @media (min-width: 1200px) and (max-height: 900px) {
            .site-nav {
                min-height: 60px;
            }

            .site-logo {
                width: 44px;
                height: 44px;
            }

            .hero-section {
                padding-top: 112px;
                padding-bottom: 28px;
            }

            .hero-title {
                max-width: min(1060px, 74vw);
                font-size: clamp(68px, 5.7vw, 104px) !important;
                line-height: .9 !important;
            }

            .hero-text {
                max-width: 660px;
                margin-top: 18px;
                font-size: 17px;
                line-height: 1.5;
            }

            .hero-points {
                margin-top: 16px;
            }

            .hero-actions {
                margin-top: 22px;
            }
        }

        .registration-field input:focus {
            border-color: hsl(var(--gold));
            box-shadow: 0 0 0 3px rgba(201, 164, 92, .12);
        }

        .registration-submit {
            min-height: 52px;
            margin-top: 6px;
            border: 0;
            border-radius: 999px;
            background: hsl(var(--gold));
            color: #050505;
            cursor: pointer;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .registration-submit:disabled {
            cursor: wait;
            opacity: .7;
        }

        .registration-message {
            min-height: 20px;
            color: rgba(255, 255, 255, .72);
            font-size: 13px;
            line-height: 1.45;
        }

        .location-section {
            position: relative;
            overflow: hidden;
            padding: clamp(28px, 5vw, 56px);
            border: 1px solid rgba(201, 164, 92, .18);
            border-radius: 36px;
            background:
                radial-gradient(circle at 18% 12%, rgba(201, 164, 92, .16), transparent 28%),
                linear-gradient(135deg, rgba(12, 12, 16, .96), rgba(4, 4, 6, .96));
            box-shadow: 0 28px 80px rgba(0, 0, 0, .42);
        }

        .location-layout {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, .85fr) minmax(420px, 1.15fr);
            gap: clamp(28px, 5vw, 64px);
            align-items: stretch;
        }

        .location-kicker {
            display: inline-flex;
            margin-bottom: 18px;
            color: hsl(var(--gold-light));
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .location-title {
            margin: 0 0 24px;
            color: #fff;
            font-size: clamp(38px, 5vw, 64px);
            line-height: 1;
        }

        .location-title span {
            color: hsl(var(--gold));
        }

        .address-card {
            margin-top: 34px;
            padding: 24px;
            border: 1px solid rgba(201, 164, 92, .22);
            border-radius: 24px;
            background: rgba(0, 0, 0, .34);
        }

        .address-label {
            display: block;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, .48);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .address-main {
            margin: 0;
            color: #fff;
            font-size: clamp(24px, 3vw, 36px);
            font-weight: 700;
            line-height: 1.18;
        }

        .location-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 24px 0 0;
        }

        .location-meta span {
            min-height: 34px;
            padding: 0 13px;
            display: inline-flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 999px;
            background: rgba(255, 255, 255, .04);
            color: rgba(255, 255, 255, .72);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .location-map-card {
            position: relative;
            min-height: 470px;
            padding: 10px;
            border: 1px solid rgba(201, 164, 92, .24);
            border-radius: 34px;
            background: rgba(255, 255, 255, .04);
            box-shadow: 0 0 60px rgba(201, 164, 92, .08);
            overflow: hidden;
        }

        .location-map-card iframe {
            width: 100%;
            height: 100%;
            min-height: 450px;
            border: 0;
            border-radius: 26px;
            filter: saturate(.82) contrast(1.06) brightness(.72);
        }

        .map-caption {
            position: absolute;
            left: 28px;
            bottom: 28px;
            max-width: calc(100% - 56px);
            padding: 14px 16px;
            border: 1px solid rgba(201, 164, 92, .18);
            border-radius: 18px;
            background: rgba(0, 0, 0, .72);
            color: rgba(255, 255, 255, .8);
            font-size: 13px;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        @media (max-width: 900px) {
            .location-layout {
                grid-template-columns: 1fr;
            }

            .location-map-card {
                min-height: 360px;
            }

            #about>.grid,
            #events-grid {
                grid-template-columns: 1fr;
            }

            footer>div {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .footer-address,
            .footer-description {
                justify-content: flex-start;
                text-align: left;
            }

            .footer-address p {
                white-space: normal;
            }

            .footer-description p {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .site-nav {
                width: calc(100% - 24px);
                min-height: 0;
                top: 12px;
                margin: 0;
                grid-template-columns: auto minmax(0, auto);
                justify-content: space-between;
                row-gap: 10px;
                padding: 8px 10px 10px 14px;
                border-radius: 24px;
            }

            .site-logo {
                width: 44px;
                height: 44px;
            }

            .site-links {
                grid-column: 1 / -1;
                width: 100%;
                display: flex;
                justify-content: flex-start;
                gap: 14px;
                overflow-x: auto;
                padding: 2px 2px 4px;
                scrollbar-width: none;
            }

            .site-links::-webkit-scrollbar {
                display: none;
            }

            .site-links a {
                flex: 0 0 auto;
                font-size: 11px;
                letter-spacing: .08em;
            }

            .telegram-link {
                min-height: 40px;
                padding: 0 13px;
                font-size: 10px;
                letter-spacing: .1em;
            }

            .telegram-popover {
                display: none;
            }

            .hero-section {
                min-height: calc(100vh - 77px);
                display: flex;
                align-items: stretch;
                padding: 170px 24px 28px;
            }

            .hero-section::after {
                background:
                    linear-gradient(0deg, #020202 0%, rgba(2, 2, 2, .92) 18%, rgba(2, 2, 2, .54) 58%, rgba(2, 2, 2, .18) 100%),
                    linear-gradient(90deg, rgba(2, 2, 2, .96) 0%, rgba(2, 2, 2, .46) 58%, #020202 100%);
            }

            .hero-copy {
                min-height: calc(100vh - 275px);
                max-width: 100%;
                display: flex;
                flex-direction: column;
            }

            .hero-kicker {
                margin-bottom: 14px;
                font-size: 11px;
                letter-spacing: .18em;
            }

            .hero-title {
                max-width: min(350px, 100%);
                font-size: clamp(28px, 7.8vw, 32px) !important;
                line-height: 1.02 !important;
                font-weight: 800;
                overflow-wrap: normal;
                hyphens: auto;
            }

            .hero-title span {
                display: block;
            }

            .hero-text {
                max-width: 335px;
                margin-top: 28px;
                font-size: 18px;
                line-height: 1.58;
            }

            .hero-points {
                max-width: 335px;
                gap: 7px;
                margin-top: auto;
                padding-top: 30px;
            }

            .hero-points span {
                min-height: 25px;
                padding: 0 9px;
                font-size: 9px;
            }

            .hero-actions {
                justify-content: stretch;
                margin-top: 18px;
                padding-top: 0;
            }

            .hero-actions .btn-gold {
                width: 100%;
                max-width: 330px;
                min-height: 42px;
                padding-left: 18px !important;
                padding-right: 18px !important;
                font-size: 12px;
                line-height: 1.25;
                text-align: center;
                white-space: normal;
            }

            .hero-jaguar {
                inset: 0;
            }

            .hero-jaguar img {
                object-position: 65% 44%;
                opacity: .68;
                -webkit-mask-image: linear-gradient(0deg, transparent 0%, #000 8%, #000 86%, transparent 100%);
                mask-image: linear-gradient(0deg, transparent 0%, #000 8%, #000 86%, transparent 100%);
            }

            #rating .liquid-glass {
                padding: 16px !important;
                border-radius: 24px;
            }

            main {
                margin-top: 28px;
                padding: 72px 8px 56px;
            }

            main section {
                margin-bottom: 72px;
            }

            #rating {
                margin-bottom: 140px;
            }

            section[id] {
                scroll-margin-top: 72px;
            }

            main section>div:first-child {
                gap: 14px;
                margin-bottom: 28px;
            }

            main section>div:first-child h2 {
                font-size: 28px;
            }

            #about>p {
                margin-bottom: 28px;
                padding-left: 14px;
                font-size: 16px;
            }

            #events-grid {
                gap: 0;
            }

            #events-grid>.liquid-glass,
            #rating>.liquid-glass,
            .faq-item {
                padding: 20px;
            }

            .event-card {
                padding: 24px;
                border-radius: 24px;
            }

            .event-card-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
                margin-bottom: 18px;
            }

            .event-title {
                font-size: 25px;
            }

            .telegram-registration {
                grid-template-columns: 1fr;
                margin-top: 24px;
                border-radius: 24px;
            }

            .telegram-registration-actions {
                margin-top: 18px;
            }

            .telegram-bot-link {
                width: 100%;
            }

            .telegram-qr {
                display: none;
            }

            .telegram-qr-copy {
                display: none;
            }

            .faq-question-text {
                font-size: 16px;
            }

            footer {
                padding: 24px 18px 30px;
            }

            #rating table {
                table-layout: fixed;
                min-width: 0;
            }

            #rating th,
            #rating td {
                padding: 12px 6px !important;
                font-size: 12px;
                line-height: 1.25;
            }

            #rating th:first-child,
            #rating td:first-child {
                width: 42px;
            }

            #rating th:nth-child(2),
            #rating td:nth-child(2) {
                width: 38%;
            }

            #rating th:nth-child(3),
            #rating td:nth-child(3),
            #rating th:nth-child(4),
            #rating td:nth-child(4),
            #rating th:nth-child(5),
            #rating td:nth-child(5) {
                width: 19%;
            }

            #rating td:nth-child(2) {
                overflow-wrap: anywhere;
            }

            #schedule .liquid-glass,
            .location-section {
                border-radius: 24px;
            }

            .registration-dialog {
                border-radius: 22px;
            }

            .registration-header,
            .registration-form {
                padding-left: 20px;
                padding-right: 20px;
            }

            footer {
                padding: 22px 14px 28px;
            }

            footer>div {
                gap: 11px;
            }

            .footer-block {
                align-items: flex-start;
            }

            .footer-address p {
                font-size: 13px;
            }
        }
    </style>
</head>

<body class="antialiased selection:bg-[hsl(var(--gold))] selection:text-black">

    <video autoplay loop muted playsinline class="video-bg">
        <source src="https://cdn.pixabay.com/video/2020/05/24/40061-424754593_large.mp4" type="video/mp4">
    </video>

    <!-- Навигация -->
    <nav class="site-nav" aria-label="Главная навигация">
        <a href="#" aria-label="НАТС Poker Club">
            <img src="header-logo-clean.png" alt="HATC" class="site-logo" />
        </a>

        <div class="site-links">
            <a href="#">Главная</a>
            <a href="#about">О клубе</a>
            <a href="#schedule">Мероприятия</a>
            <a href="#rating">Рейтинг</a>
            <a href="#faq">FAQ</a>
        </div>

        <div class="telegram-nav">
            <a href="https://t.me/nuts163" target="_blank" class="telegram-link" aria-label="Наш ТГ канал подпишись">
                <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor">
                    <path d="M21.8 4.6 18.6 19.7c-.2 1-.8 1.2-1.6.8l-4.5-3.3-2.2 2.1c-.2.2-.4.4-.9.4l.3-4.7 8.6-7.8c.4-.3-.1-.5-.6-.2L7.1 13.7 2.5 12.2c-1-.3-1-1 .2-1.4L20.5 3.9c.8-.3 1.5.2 1.3.7Z" />
                </svg>
                Наш ТГ канал подпишись
            </a>
            <a class="telegram-popover" href="https://t.me/nuts163" target="_blank" rel="noopener" aria-label="Открыть Telegram-канал NUTS163">
                <img src="telegram-channel-qr.png" alt="QR-код Telegram-канала NUTS163">
                <span>Наведи камеру телефона для подписки</span>
            </a>
        </div>
    </nav>

    <!-- Главный Экран (Hero Section) -->
    <section class="hero-section">
        <div class="hero-jaguar" aria-hidden="true">
            <img src="hero-jaguar.jpg" alt="">
        </div>

        <div class="hero-copy animate-fade-rise">
            <span class="hero-kicker">НАТС Poker Club</span>
            <h1 class="hero-title text-4xl sm:text-5xl md:text-6xl leading-[1.08] max-w-4xl font-normal font-display">
                Профессиональный спортивный <span>Техасский холдем</span>
            </h1>
            <p class="hero-text">
                Турниры на интерес, клубный рейтинг и атмосфера точного хода. Без ставок за столом и обмена фишек на деньги.
            </p>
            <div class="hero-points" aria-label="Ключевые условия клуба">
                <span>18+</span>
                <span>0 ставок</span>
                <span>Рейтинг вместо банка</span>
            </div>

            <div class="hero-actions flex flex-col sm:flex-row gap-5 animate-fade-rise delay-2">
                <a href="#faq"
                    class="btn-gold rounded-full px-14 py-4 text-base tracking-widest uppercase inline-flex items-center justify-center">
                    Важно: ознакомьтесь с правилами клуба
                </a>
            </div>
        </div>
    </section>

    <!-- Основной Контент -->
    <main
        class="relative z-20 bg-[hsl(var(--background))]/95 backdrop-blur-3xl border-t border-[hsl(var(--gold))]/20 pt-28 pb-20 px-6 mt-10 shadow-[0_-30px_60px_rgba(0,0,0,0.9)]">

        <!-- О клубе -->
        <section id="about" class="max-w-7xl mx-auto mb-32">
            <div class="flex items-center gap-6 mb-12">
                <h2 class="text-4xl sm:text-5xl font-display text-white">О <span
                        class="text-[hsl(var(--gold))]">клубе</span></h2>
                <div class="h-[1px] bg-gradient-to-r from-[hsl(var(--gold))] to-transparent flex-1"></div>
            </div>

            <p class="text-gray-400 mb-12 text-xl border-l-[3px] border-[hsl(var(--gold))] pl-6 font-light">Турниры по
                спортивно-развлекательному покеру. Любая игра на деньги или другие формы азартного вознаграждения в
                нашем клубе запрещена.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Карточка 1: Строго 18+ -->
                <div class="card-custom border-[hsl(var(--gold))]/40 items-center justify-center text-center"
                    style="background-image: url('https://images.unsplash.com/photo-1597075687490-8f673c6c17f6?w=600&q=80'); background-size: cover; background-position: center;">
                    <h3 class="text-5xl font-display text-[hsl(var(--gold))] drop-shadow-lg relative z-10">Строго 18+
                    </h3>
                </div>

                <!-- Карточка 2: Локация -->
                <div class="card-custom group"
                    style="background-image: url('https://image.pollinations.ai/prompt/empty%20professional%20poker%20table%20in%20dark%20room%20cinematic%20lighting?width=600&height=400&nologo=true'); background-size: cover; background-position: center;">
                    <div class="mt-auto pt-16 relative z-10">
                        <h3
                            class="text-2xl font-display text-[hsl(var(--gold))] mb-2 group-hover:text-white transition-colors">
                            Локация</h3>
                        <p class="text-[hsl(var(--gold))] text-sm mb-1 font-medium drop-shadow-md">г. Самара</p>
                        <p class="text-white text-sm opacity-90 drop-shadow-md">пр. Карла Маркса 55</p>
                    </div>
                </div>

                <!-- Карточка 3: Во что играем -->
                <div class="card-custom group"
                    style="background-image: url('about-game.jpg'); background-size: cover; background-position: center;">
                    <div class="mt-auto pt-16 relative z-10">
                        <h3
                            class="text-2xl font-display text-[hsl(var(--gold))] mb-2 group-hover:text-white transition-colors">
                            Во что играем</h3>
                        <p class="text-white text-sm opacity-90 drop-shadow-md">Классический Texas Hold'em ежедневно</p>
                    </div>
                </div>

                <!-- Карточка 4: Турниры -->
                <div class="card-custom group"
                    style="background-image: url('about-tournaments.jpg'); background-size: cover; background-position: center;">
                    <div class="mt-auto pt-16 relative z-10">
                        <h3
                            class="text-2xl font-display text-[hsl(var(--gold))] mb-2 group-hover:text-white transition-colors">
                            Турниры</h3>
                        <p class="text-white text-sm opacity-90 drop-shadow-md">Следи за расписанием мероприятий, и
                            побеждай среди лучших</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Мероприятия клуба -->
        <section id="schedule" class="max-w-7xl mx-auto mb-32">
            <div class="flex items-center gap-6 mb-12">
                <h2 class="text-4xl sm:text-5xl font-display text-white"><span
                        class="text-[hsl(var(--gold))]">Мероприятия клуба</span></h2>
                <div class="h-[1px] bg-gradient-to-r from-[hsl(var(--gold))] to-transparent flex-1"></div>
            </div>

            <div id="events-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="liquid-glass p-8 rounded-3xl border-t-[3px] border-t-[hsl(var(--gold))] shadow-2xl md:col-span-2 lg:col-span-3 text-center">
                    <p class="text-[hsl(var(--gold))]/70 animate-pulse font-light tracking-wide">
                        Подключение к Google Таблице и обновление мероприятий...
                    </p>
                </div>
            </div>

            <div class="telegram-registration">
                <div>
                    <span class="telegram-registration-kicker">Запись через Telegram</span>
                    <h3 class="telegram-registration-title">Бот быстро примет заявку на турнир</h3>
                    <p class="telegram-registration-text">Нажмите кнопку, чтобы открыть Telegram-бота<span class="telegram-qr-copy">, или наведите камеру телефона на QR-код</span>.</p>
                    <div class="telegram-registration-actions">
                        <a class="telegram-bot-link" href="https://t.me/Nuts63Bot" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor">
                                <path d="M21.8 4.6 18.6 19.7c-.2 1-.8 1.2-1.6.8l-4.5-3.3-2.2 2.1c-.2.2-.4.4-.9.4l.3-4.7 8.6-7.8c.4-.3-.1-.5-.6-.2L7.1 13.7 2.5 12.2c-1-.3-1-1 .2-1.4L20.5 3.9c.8-.3 1.5.2 1.3.7Z" />
                            </svg>
                            Написать в Telegram-бот
                        </a>
                    </div>
                </div>
                <a class="telegram-qr" href="https://t.me/Nuts63Bot" target="_blank" rel="noopener" aria-label="Открыть Telegram-бот Nuts63Bot">
                    <img src="telegram-qr.png" alt="QR-код Telegram-бота Nuts63Bot">
                </a>
            </div>

            <script>
                const NATS_TELEGRAM_BOT_URL = 'https://t.me/Nuts63Bot';
                const NATS_REGISTRATION_ENDPOINT = '';

                async function loadClubEvents() {
                    const sheetId = '1p7Dtsw5Wdd3KUEO6ul-7aELiEbVcoNFFjsCvwAQsmPI';
                    const gid = '1910916652';
                    const csvUrl = `https://docs.google.com/spreadsheets/d/${sheetId}/export?format=csv&gid=${gid}`;
                    const grid = document.getElementById('events-grid');
                    const fallbackRows = [
                        ['2026.05.22', '19:00', 'OPEN  CLUB', 'бесплатно', '30', 'finished'],
                        ['2026.06.01', '20:00', 'sunday test', 'бесплатно', '30', 'active']
                    ];

                    const parseCsv = (csvText) => csvText.trim().split(/\r?\n/).map(row => {
                        const cells = [];
                        let currentCell = '';
                        let inQuotes = false;
                        for (let i = 0; i < row.length; i++) {
                            if (row[i] === '"') {
                                inQuotes = !inQuotes;
                            } else if (row[i] === ',' && !inQuotes) {
                                cells.push(currentCell.trim());
                                currentCell = '';
                            } else {
                                currentCell += row[i];
                            }
                        }
                        cells.push(currentCell.trim());
                        return cells;
                    });

                    const statusLabels = {
                        active: 'Идет запись',
                        finished: 'Завершен',
                        draft: 'Скоро',
                        closed: 'Регистрация закрыта'
                    };

                    const formatDate = (value) => {
                        const match = String(value || '').match(/^(\d{4})[.-](\d{2})[.-](\d{2})$/);
                        if (!match) return value || 'Дата уточняется';
                        const date = new Date(Number(match[1]), Number(match[2]) - 1, Number(match[3]));
                        return date.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', weekday: 'long' });
                    };

                    const escapeHtml = (value) => String(value || '').replace(/[&<>"']/g, (char) => ({
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#039;'
                    }[char]));

                    const renderEvents = (rows) => {
                        const dataRows = rows.filter(row => row[2] && row[2].toLowerCase() !== 'название');
                        if (!dataRows.length) {
                            grid.innerHTML = '<div class="liquid-glass p-8 rounded-3xl text-center md:col-span-2 lg:col-span-3 text-gray-400">В таблице пока нет мероприятий.</div>';
                            return;
                        }

                        grid.innerHTML = '';
                        dataRows.forEach((row) => {
                            const [date, time, rawTitle, type, , status] = row;
                            const title = String(rawTitle || '').replace(/\s+/g, ' ').trim();
                            const isFinished = String(status).toLowerCase() === 'finished';
                            const card = document.createElement('article');
                            card.className = 'event-card';
                            const dateLabel = formatDate(date);
                            const formatLabel = type || 'клубный формат';
                            card.innerHTML = `
                                <div class="event-card-header">
                                    <span class="event-status ${isFinished ? 'is-finished' : ''}">${escapeHtml(statusLabels[String(status).toLowerCase()] || status || 'Анонс')}</span>
                                </div>
                                <h3 class="event-title">${escapeHtml(title)}</h3>
                                <p class="event-date">${escapeHtml(dateLabel)}${time ? ` · ${escapeHtml(time)}` : ''}</p>
                                <div class="event-type">
                                    <span class="event-type-value">${escapeHtml(formatLabel)}</span>
                                </div>
                                <div class="event-details">
                                    <div class="event-detail">Фишки имеют только игровую ценность.</div>
                                    <div class="event-detail">Участники соревнуются за рейтинг клуба.</div>
                                </div>
                            `;
                            grid.appendChild(card);
                        });
                    };

                    try {
                        const response = await fetch(`${csvUrl}&t=${Date.now()}`, { cache: 'no-store' });
                        if (!response.ok) throw new Error('Network error');
                        const rows = parseCsv(await response.text()).slice(1);
                        renderEvents(rows);
                    } catch (error) {
                        console.error('Ошибка мероприятий:', error);
                        renderEvents(fallbackRows);
                    }
                }

                document.addEventListener('DOMContentLoaded', () => {
                    loadClubEvents();
                    setInterval(loadClubEvents, 60000);
                });
            </script>
        </section>

        <!-- НОВЫЙ РАЗДЕЛ FAQ - в стиле остальных секций -->
        <section id="faq" class="max-w-7xl mx-auto mb-32">
            <div class="flex items-center gap-6 mb-12">
                <h2 class="text-4xl sm:text-5xl font-display text-white">Часто задаваемые <span
                        class="text-[hsl(var(--gold))]">вопросы</span></h2>
                <div class="h-[1px] bg-gradient-to-r from-[hsl(var(--gold))] to-transparent flex-1"></div>
            </div>

            <div class="space-y-5">
                <!-- FAQ Item 1 -->
                <div
                    class="faq-item liquid-glass rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:border-[hsl(var(--gold))]/40 border border-transparent hover:shadow-xl">
                    <div class="faq-question flex justify-between items-center">
                        <span
                            class="faq-question-text text-xl font-display text-white tracking-wide transition-colors">Это
                            легально?</span>
                        <span class="faq-icon text-2xl text-[hsl(var(--gold))] font-light">+</span>
                    </div>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-out">
                        <div class="faq-answer-inner pt-4 text-gray-300 leading-relaxed border-t border-white/10 mt-2">
                            Да. Мы играем не на деньги, без призов, соответственно наша игра не является азартной и
                            абсолютно легальна!
                            В законе № 244-ФЗ «О государственном регулировании деятельности по организации и проведению
                            азартных игр»
                            четко сказано, что запрещена любая игра с призами, с соглашением о выигрыше.
                            В России не запрещен покер как игра, только его вариации с деньгами и материальными
                            выигрышами.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div
                    class="faq-item liquid-glass rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:border-[hsl(var(--gold))]/40 border border-transparent hover:shadow-xl">
                    <div class="faq-question flex justify-between items-center">
                        <span
                            class="faq-question-text text-xl font-display text-white tracking-wide transition-colors">Зачем
                            играть не на деньги?</span>
                        <span class="faq-icon text-2xl text-[hsl(var(--gold))] font-light">+</span>
                    </div>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-out">
                        <div class="faq-answer-inner pt-4 text-gray-300 leading-relaxed border-t border-white/10 mt-2">
                            Мы объединяем потрясающее коммьюнити по интересам и предлагаем уникальный продукт.
                            Где еще вы сможете найти потрясающую компанию, топовое оборудование и сервис всего за 1000
                            ₽,
                            при этом не рискуя своей свободой?
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div
                    class="faq-item liquid-glass rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:border-[hsl(var(--gold))]/40 border border-transparent hover:shadow-xl">
                    <div class="faq-question flex justify-between items-center">
                        <span
                            class="faq-question-text text-xl font-display text-white tracking-wide transition-colors">Сколько
                            стоит участие?</span>
                        <span class="faq-icon text-2xl text-[hsl(var(--gold))] font-light">+</span>
                    </div>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-out">
                        <div class="faq-answer-inner pt-4 text-gray-300 leading-relaxed border-t border-white/10 mt-2">
                            Участие в мероприятии стоит 1000₽. Организационным взносом являются денежные средства,
                            вносимые участником Клубу в качестве платы за предоставление комплекса услуг.
                            Повторный вход (re-entry) — 1000₽.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div
                    class="faq-item liquid-glass rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:border-[hsl(var(--gold))]/40 border border-transparent hover:shadow-xl">
                    <div class="faq-question flex justify-between items-center">
                        <span
                            class="faq-question-text text-xl font-display text-white tracking-wide transition-colors">Стартовый
                            стек</span>
                        <span class="faq-icon text-2xl text-[hsl(var(--gold))] font-light">+</span>
                    </div>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-out">
                        <div class="faq-answer-inner pt-4 text-gray-300 leading-relaxed border-t border-white/10 mt-2">
                            Стек — это набор фишек для участия. Фишки не имеют денежной стоимости и не могут быть
                            обменены.
                            Стартовый набор: 30 000 фишек (50 000 для Deep Stack).
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Рейтинг игроков (Google Таблица) -->
        <section id="rating" class="max-w-7xl mx-auto mb-32">
            <div class="flex items-center gap-6 mb-12">
                <h2 class="text-4xl sm:text-5xl font-display text-white">Рейтинг <span
                        class="text-[hsl(var(--gold))]">игроков</span></h2>
                <div class="h-[1px] bg-gradient-to-r from-[hsl(var(--gold))] to-transparent flex-1"></div>
            </div>

            <div
                class="liquid-glass rounded-3xl p-6 md:p-10 shadow-2xl overflow-hidden border-t-[3px] border-t-[hsl(var(--gold))]">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="rating-table">
                        <thead>
                            <tr
                                class="border-b border-white/10 text-[hsl(var(--gold-light))] text-xs md:text-sm uppercase tracking-widest bg-black/20">
                                <th class="py-5 px-4 font-semibold w-16 text-center">#</th>
                                <th class="py-5 px-4 font-semibold">Игрок</th>
                                <th class="py-5 px-4 font-semibold text-center">Очки</th>
                                <th class="py-5 px-4 font-semibold text-center">Тур.</th>
                                <th class="py-5 px-4 font-semibold text-center">Поб.</th>
                            </tr>
                        </thead>
                        <tbody id="rating-tbody" class="text-gray-300 divide-y divide-white/5">
                            <tr>
                                <td colspan="5"
                                    class="py-12 text-center text-[hsl(var(--gold))]/60 animate-pulse font-light tracking-wide">
                                    Подключение к Google Таблице и обновление рейтинга...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right text-xs text-gray-500 font-light">Обновляется в режиме реального времени
                </div>
            </div>

            <script>
                async function loadGoogleSheet() {
                    const sheetId = '1p7Dtsw5Wdd3KUEO6ul-7aELiEbVcoNFFjsCvwAQsmPI';
                    const gid = '1100616475';
                    const csvUrl = `https://docs.google.com/spreadsheets/d/${sheetId}/export?format=csv&gid=${gid}`;
                    const tbody = document.getElementById('rating-tbody');

                    try {
                        const response = await fetch(`${csvUrl}&t=${Date.now()}`, { cache: "no-store" });
                        if (!response.ok) throw new Error('Network error');
                        const csvText = await response.text();

                        const rows = csvText.split(/\r?\n/).map(row => {
                            let cells = [];
                            let inQuotes = false;
                            let currentCell = '';
                            for (let i = 0; i < row.length; i++) {
                                if (row[i] === '"') {
                                    inQuotes = !inQuotes;
                                } else if (row[i] === ',' && !inQuotes) {
                                    cells.push(currentCell.trim());
                                    currentCell = '';
                                } else {
                                    currentCell += row[i];
                                }
                            }
                            cells.push(currentCell.trim());
                            return cells;
                        });

                        tbody.innerHTML = '';

                        const dataRows = rows.slice(1).filter(r => r.length > 1 && r[0] !== '');

                        if (dataRows.length === 0) {
                            tbody.innerHTML = '<tr><td colspan="5" class="py-12 text-center text-gray-400 font-light tracking-wide">Таблица пока пуста. Регистрация продолжается.</td></tr>';
                            return;
                        }

                        dataRows.forEach((row, index) => {
                            const rank = index + 1;
                            const name = row[0] || 'Неизвестно';
                            const points = row[1] || '0';
                            const tours = row[2] || '0';
                            const wins = row[3] || '0';

                            let rankClass = "text-gray-400 font-medium";
                            let rankDisplay = rank;
                            let rowClass = "";

                            if (rank === 1) { rankClass = "text-[#FFD700] text-xl font-bold"; rankDisplay = "🥇"; rowClass = "bg-[#FFD700]/5"; }
                            else if (rank === 2) { rankClass = "text-[#E3E4E5] text-xl font-bold"; rankDisplay = "🥈"; rowClass = "bg-[#E3E4E5]/5"; }
                            else if (rank === 3) { rankClass = "text-[#CD7F32] text-xl font-bold"; rankDisplay = "🥉"; rowClass = "bg-[#CD7F32]/5"; }

                            const tr = document.createElement('tr');
                            tr.className = `hover:bg-white/5 transition-colors group ${rowClass}`;
                            tr.innerHTML = `
                                <td class="py-4 px-4 ${rankClass} text-center w-16">${rankDisplay}</td>
                                <td class="py-4 px-4 font-medium text-white tracking-wide">${String(name).replace(/[&<>"']/g, '')}</td>
                                <td class="py-4 px-4 text-center font-bold text-[hsl(var(--gold))]">${String(points).replace(/[&<>"']/g, '')}</td>
                                <td class="py-4 px-4 text-center text-gray-400 group-hover:text-white transition-colors">${String(tours).replace(/[&<>"']/g, '')}</td>
                                <td class="py-4 px-4 text-center text-gray-400 group-hover:text-white transition-colors">${String(wins).replace(/[&<>"']/g, '')}</td>
                            `;
                            tbody.appendChild(tr);
                        });

                    } catch (err) {
                        console.error('Ошибка рейтинга:', err);
                        tbody.innerHTML = '<tr><td colspan="5" class="py-12 text-center text-red-400/80 font-light">Не удалось загрузить таблицу.<br><span class="text-sm mt-2 block opacity-70">Убедитесь, что в Google Таблице выбран "Доступ всем, у кого есть ссылка" (режим "Читатель").</span></td></tr>';
                    }
                }
                document.addEventListener('DOMContentLoaded', () => {
                    loadGoogleSheet();
                    setInterval(loadGoogleSheet, 60000);
                });
            </script>
        </section>

    </main>

    <div class="registration-modal" id="registrationModal" aria-hidden="true">
        <div class="registration-dialog" role="dialog" aria-modal="true" aria-labelledby="registrationTitle">
            <div class="registration-header">
                <div>
                    <span class="registration-kicker">Запись на турнир</span>
                    <h2 class="registration-title" id="registrationTitle">Название турнира</h2>
                </div>
                <button class="registration-close" type="button" id="registrationClose" aria-label="Закрыть">×</button>
            </div>

            <form class="registration-form" id="registrationForm">
                <input type="hidden" name="tournament" id="registrationTournament">
                <input type="hidden" name="eventDate" id="registrationDate">
                <input type="hidden" name="eventDateLabel" id="registrationDateLabel">
                <input type="hidden" name="eventTime" id="registrationTime">
                <input type="hidden" name="eventType" id="registrationType">

                <label class="registration-field">
                    <span>Ник игрока</span>
                    <div class="voice-input-row">
                        <input type="text" name="nickname" id="registrationNickname" autocomplete="nickname" required>
                        <button class="voice-button" type="button" data-voice-target="registrationNickname"
                            aria-label="Продиктовать ник" title="Продиктовать ник">🎙</button>
                    </div>
                </label>

                <label class="registration-field">
                    <span>Телефон</span>
                    <div class="voice-input-row">
                        <input type="tel" name="phone" id="registrationPhone" autocomplete="tel" inputmode="tel" required>
                        <button class="voice-button" type="button" data-voice-target="registrationPhone"
                            data-voice-mode="phone" aria-label="Продиктовать телефон"
                            title="Продиктовать телефон">🎙</button>
                    </div>
                </label>

                <button class="registration-submit" type="submit">Записаться</button>
                <p class="registration-message" id="registrationMessage"></p>
            </form>

            <iframe name="registrationTransport" id="registrationTransport" hidden></iframe>
        </div>
    </div>

    <!-- Подвал -->
    <footer>
        <div>
            <div class="footer-block footer-brand">
                <img src="footer-logo-white-black.png" alt="HATC Logo" class="footer-logo" />
            </div>

            <div class="footer-block footer-address">
                <span class="footer-kicker">Адрес</span>
                <p>г. Самара, пр. Карла Маркса 55</p>
            </div>

            <div class="footer-block footer-description">
                <span class="footer-kicker">Формат</span>
                <p>Клуб ориентирован на спортивный и любительский покер.
                    Азартные игры не проводятся. Турниры носят ознакомительный и соревновательный характер.</p>
            </div>
        </div>
    </footer>

    <script>
        const registrationModal = document.getElementById('registrationModal');
        const registrationForm = document.getElementById('registrationForm');
        const registrationMessage = document.getElementById('registrationMessage');
        const registrationClose = document.getElementById('registrationClose');
        const registrationSubmit = registrationForm.querySelector('.registration-submit');
        const voiceButtons = document.querySelectorAll('[data-voice-target]');
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        let activeRecognition = null;
        let activeVoiceButton = null;
        const registrationFields = {
            title: document.getElementById('registrationTitle'),
            tournament: document.getElementById('registrationTournament'),
            date: document.getElementById('registrationDate'),
            dateLabel: document.getElementById('registrationDateLabel'),
            time: document.getElementById('registrationTime'),
            type: document.getElementById('registrationType'),
            nickname: document.getElementById('registrationNickname'),
            phone: document.getElementById('registrationPhone')
        };

        const spokenDigits = {
            'ноль': '0',
            'нуль': '0',
            'один': '1',
            'одна': '1',
            'два': '2',
            'две': '2',
            'три': '3',
            'четыре': '4',
            'пять': '5',
            'шесть': '6',
            'семь': '7',
            'восемь': '8',
            'девять': '9'
        };

        function normalizeVoiceValue(value, mode) {
            const text = value.trim();

            if (mode !== 'phone') {
                return text;
            }

            return text
                .toLowerCase()
                .replace(/плюс/g, '+')
                .replace(/[а-яё]+/gi, (word) => spokenDigits[word] || '')
                .replace(/[^\d+]/g, '');
        }

        function setVoiceState(button, isListening) {
            if (button) {
                button.classList.toggle('is-listening', isListening);
                button.setAttribute('aria-pressed', String(isListening));
            }
        }

        function stopVoiceInput() {
            if (activeRecognition) {
                activeRecognition.abort();
                activeRecognition = null;
            }
            setVoiceState(activeVoiceButton, false);
            activeVoiceButton = null;
        }

        function startVoiceInput(button) {
            if (!SpeechRecognition) {
                registrationMessage.textContent = 'Голосовой ввод поддерживается в Chrome, Edge и Яндекс Браузере.';
                return;
            }

            if (activeVoiceButton === button) {
                stopVoiceInput();
                return;
            }

            stopVoiceInput();

            const target = document.getElementById(button.dataset.voiceTarget);
            if (!target) return;

            const recognition = new SpeechRecognition();
            activeRecognition = recognition;
            activeVoiceButton = button;
            recognition.lang = 'ru-RU';
            recognition.interimResults = false;
            recognition.continuous = false;

            recognition.onstart = () => {
                setVoiceState(button, true);
                target.focus();
                registrationMessage.textContent = 'Говорите, я записываю...';
            };

            recognition.onresult = (event) => {
                const transcript = Array.from(event.results)
                    .map((result) => result[0].transcript)
                    .join(' ');
                const value = normalizeVoiceValue(transcript, button.dataset.voiceMode);

                if (value) {
                    target.value = value;
                    target.dispatchEvent(new Event('input', { bubbles: true }));
                    registrationMessage.textContent = 'Готово, голосовой ввод добавлен.';
                }
            };

            recognition.onerror = (event) => {
                const messages = {
                    'not-allowed': 'Разрешите доступ к микрофону в браузере и нажмите кнопку еще раз.',
                    'no-speech': 'Не расслышал. Нажмите микрофон и попробуйте еще раз.',
                    'audio-capture': 'Браузер не видит микрофон. Проверьте устройство ввода.'
                };
                registrationMessage.textContent = messages[event.error] || 'Голосовой ввод не сработал. Попробуйте еще раз.';
            };

            recognition.onend = () => {
                if (activeRecognition === recognition) {
                    activeRecognition = null;
                    setVoiceState(button, false);
                    activeVoiceButton = null;
                }
            };

            recognition.start();
        }

        if (!SpeechRecognition) {
            voiceButtons.forEach((button) => {
                button.disabled = true;
                button.title = 'Голосовой ввод не поддерживается этим браузером';
            });
        }

        voiceButtons.forEach((button) => {
            button.addEventListener('click', () => startVoiceInput(button));
        });

        function openRegistrationModal(button) {
            const tournament = button.dataset.tournament || 'Турнир';
            registrationFields.title.textContent = tournament;
            registrationFields.tournament.value = tournament;
            registrationFields.date.value = button.dataset.date || '';
            registrationFields.dateLabel.value = button.dataset.dateLabel || '';
            registrationFields.time.value = button.dataset.time || '';
            registrationFields.type.value = button.dataset.type || '';
            registrationFields.nickname.value = '';
            registrationFields.phone.value = '';
            registrationMessage.textContent = '';
            registrationSubmit.disabled = false;
            registrationModal.classList.add('is-open');
            registrationModal.setAttribute('aria-hidden', 'false');
            setTimeout(() => registrationFields.nickname.focus(), 50);
        }

        function closeRegistrationModal() {
            stopVoiceInput();
            registrationModal.classList.remove('is-open');
            registrationModal.setAttribute('aria-hidden', 'true');
        }

        document.addEventListener('click', (event) => {
            const button = event.target.closest('.event-register');
            if (button && !button.disabled) {
                openRegistrationModal(button);
            }
        });

        registrationClose.addEventListener('click', closeRegistrationModal);
        registrationModal.addEventListener('click', (event) => {
            if (event.target === registrationModal) closeRegistrationModal();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && registrationModal.classList.contains('is-open')) {
                closeRegistrationModal();
            }
        });

        registrationForm.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!NATS_REGISTRATION_ENDPOINT) {
                registrationMessage.textContent = 'Запись почти готова: вставьте URL Google Apps Script в NATS_REGISTRATION_ENDPOINT.';
                return;
            }

            const transportForm = document.createElement('form');
            transportForm.method = 'POST';
            transportForm.action = NATS_REGISTRATION_ENDPOINT;
            transportForm.target = 'registrationTransport';
            transportForm.style.display = 'none';

            const data = new FormData(registrationForm);
            data.append('createdAt', new Date().toISOString());
            data.append('source', 'nats-site');

            data.forEach((value, key) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = value;
                transportForm.appendChild(input);
            });

            document.body.appendChild(transportForm);
            registrationSubmit.disabled = true;
            registrationMessage.textContent = 'Отправляем запись...';
            transportForm.submit();
            transportForm.remove();

            setTimeout(() => {
                registrationMessage.textContent = 'Готово. Запись отправлена в таблицу.';
                registrationSubmit.disabled = false;
                registrationForm.reset();
            }, 900);
        });

        // FAQ Accordion Logic
        document.querySelectorAll('.faq-item').forEach(item => {
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');

            item.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Закрываем все остальные (опционально, чтобы открывался только один)
                document.querySelectorAll('.faq-item').forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        const otherIcon = otherItem.querySelector('.faq-icon');
                        otherItem.classList.remove('active');
                        otherAnswer.style.maxHeight = null;
                        if (otherIcon) otherIcon.textContent = '+';
                    }
                });

                // Toggle текущего
                if (!isActive) {
                    item.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    if (icon) icon.textContent = '−';
                } else {
                    item.classList.remove('active');
                    answer.style.maxHeight = null;
                    if (icon) icon.textContent = '+';
                }
            });
        });
    </script>
</body>

</html>

