<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
        <style>
            :root{
                --bg:#0B0E14; --bg-alt:#0F131B; --surface:#131826; --surface-alt:#182034;
                --border:rgba(255,255,255,.09); --border-strong:rgba(255,255,255,.16);
                --text:#E9ECF1; --text-muted:#8B93A6; --text-dim:#565F72;
                --accent:#FF8A4C; --accent-soft:rgba(255,138,76,.14);
                --accent-2:#5EEAD4; --accent-2-soft:rgba(94,234,212,.14);
                --danger:#FF6B6B; --success:#28C840;
                --f-display:'Space Grotesk',sans-serif; --f-body:'Inter',sans-serif; --f-mono:'JetBrains Mono',monospace;
                --radius:14px;
            }
            *{margin:0;padding:0;box-sizing:border-box;}
            body{background:var(--bg);color:var(--text);font-family:var(--f-body);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:28px;position:relative;overflow-x:hidden;}
            a{color:inherit;text-decoration:none;}
            button{font-family:inherit;cursor:pointer;}
            ::selection{background:var(--accent);color:#0B0E14;}

            #authBg{position:fixed;inset:0;pointer-events:none;}
            #authBg .grid-overlay{position:absolute;inset:0;background-image:linear-gradient(var(--border) 1px,transparent 1px),linear-gradient(90deg,var(--border) 1px,transparent 1px);background-size:56px 56px;-webkit-mask-image:radial-gradient(ellipse 65% 60% at 50% 35%,#000 10%,transparent 78%);mask-image:radial-gradient(ellipse 65% 60% at 50% 35%,#000 10%,transparent 78%);}
            #authBg .glow{position:absolute;width:560px;height:560px;border-radius:50%;background:radial-gradient(circle,rgba(255,138,76,.12),transparent 65%);top:-160px;right:-120px;}
            #authBg .glow.two{top:auto;right:auto;bottom:-200px;left:-140px;background:radial-gradient(circle,rgba(94,234,212,.10),transparent 65%);}

            .auth-wrap{position:relative;z-index:2;width:100%;max-width:430px;}

            .brand{display:flex;align-items:center;gap:10px;font-family:var(--f-display);font-weight:700;font-size:19px;letter-spacing:-.02em;margin-bottom:26px;color:var(--text);}
            .brand img{width:26px;height:26px;border-radius:7px;}
            .brand i{width:8px;height:8px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 0 4px var(--accent-2-soft);}
            .brand span{color:var(--text-dim);font-weight:500;}

            .card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:34px 32px;box-shadow:0 30px 60px rgba(0,0,0,.35);}
            .card-head{margin-bottom:24px;}
            .card-head h1{font-family:var(--f-display);font-size:24px;font-weight:600;letter-spacing:-.01em;}
            .card-head p{font-family:var(--f-mono);font-size:12px;color:var(--text-dim);margin-top:6px;}

            .field{margin-bottom:18px;}
            .field label{display:block;font-family:var(--f-mono);font-size:11px;color:var(--text-dim);margin-bottom:7px;letter-spacing:.06em;text-transform:uppercase;}
            .input{width:100%;background:var(--bg-alt);border:1px solid var(--border);border-radius:9px;padding:12px 14px;color:var(--text);font-size:14px;font-family:var(--f-body);transition:border-color .2s,box-shadow .2s;}
            .input::placeholder{color:var(--text-dim);opacity:1;}
            .input:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-soft);}
            .input-error{font-family:var(--f-mono);font-size:11.5px;color:var(--danger);margin-top:7px;}
            .input-error ul{list-style:none;}

            .auth-error{background:var(--danger);background:rgba(255,107,107,.10);border:1px solid rgba(255,107,107,.25);border-radius:9px;padding:11px 14px;font-family:var(--f-mono);font-size:12px;color:var(--danger);margin-bottom:18px;line-height:1.6;}
            .auth-status{background:var(--accent-2-soft);border:1px solid rgba(94,234,212,.25);border-radius:9px;padding:11px 14px;font-family:var(--f-mono);font-size:12px;color:var(--accent-2);margin-bottom:18px;line-height:1.6;}
            .auth-text{color:var(--text-muted);font-size:13.5px;line-height:1.7;margin-bottom:20px;}

            .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:12px 20px;border-radius:9px;font-size:14px;font-weight:600;border:1px solid transparent;transition:.2s;}
            .btn-primary{background:var(--accent);color:#12100D;}
            .btn-primary:hover{box-shadow:0 8px 22px rgba(255,138,76,.32);transform:translateY(-1px);}
            .btn-ghost{background:var(--surface-alt);border-color:var(--border);color:var(--text);}
            .btn-ghost:hover{border-color:var(--accent);color:var(--accent);}

            .row-between{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:20px;}
            .row-end{display:flex;align-items:center;justify-content:flex-end;gap:12px;margin-top:22px;}
            .row-end .btn{width:auto;padding:10px 20px;font-size:13px;}
            .remember{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--text-muted);cursor:pointer;}
            .remember input{width:15px;height:15px;accent-color:var(--accent);cursor:pointer;}
            .auth-link{color:var(--accent);font-size:13px;transition:color .2s;}
            .auth-link:hover{color:var(--accent-2);}

            .auth-alt{margin-top:20px;padding-top:18px;border-top:1px solid var(--border);text-align:center;font-size:13.5px;color:var(--text-muted);}
            .auth-alt a{color:var(--accent);}

            .back-home{display:inline-flex;align-items:center;gap:7px;margin-top:24px;font-family:var(--f-mono);font-size:12px;color:var(--text-dim);transition:color .2s;}
            .back-home:hover{color:var(--accent);}

            .btn-loading{opacity:.7;pointer-events:none;}
        </style>
    </head>
    <body>
        <div id="authBg">
            <div class="grid-overlay"></div>
            <div class="glow"></div>
            <div class="glow two"></div>
        </div>

        <div class="auth-wrap">
            <a href="{{ route('index') }}" class="brand">
                <img src="{{ asset('favicon.svg') }}" alt="MBI" class="brand-logo">
                muhammadbinimran<span>.online</span>
            </a>

            <div class="card">
                {{ $slot }}
            </div>

            <a href="{{ route('index') }}" class="back-home">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to home
            </a>
        </div>
    </body>
</html>
