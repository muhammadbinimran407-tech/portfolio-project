<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<title>Projects — Muhammad Bin Imran</title>
<meta name="description" content="Featured projects by Muhammad Bin Imran — Laravel, Go and JavaScript applications.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="icon" href="/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="/favicon.svg">
  <link rel="manifest" href="/site.webmanifest">
<style>
:root{
  --bg:#0B0E14; --bg-alt:#0F131B; --surface:#131826; --surface-alt:#182034;
  --border:rgba(255,255,255,.09); --border-strong:rgba(255,255,255,.16);
  --text:#E9ECF1; --text-muted:#8B93A6; --text-dim:#565F72;
  --accent:#FF8A4C; --accent-soft:rgba(255,138,76,.14);
  --accent-2:#5EEAD4; --accent-2-soft:rgba(94,234,212,.14);
  --danger:#FF6B6B;
  --f-display:'Space Grotesk', sans-serif; --f-body:'Inter', sans-serif; --f-mono:'JetBrains Mono', monospace;
  --radius:14px; --shadow-glow: 0 0 40px rgba(255,138,76,.18);
}
html[data-theme="light"]{
  --bg:#F5F6F8; --bg-alt:#EDEFF3; --surface:#FFFFFF; --surface-alt:#F7F8FA;
  --border:rgba(10,14,25,.09); --border-strong:rgba(10,14,25,.16);
  --text:#12161F; --text-muted:#5A6272; --text-dim:#8B93A6;
  --accent-soft:rgba(255,138,76,.12); --accent-2-soft:rgba(20,150,135,.12);
  --shadow-glow: 0 0 40px rgba(255,138,76,.12);
}
*{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}
body{background:var(--bg);color:var(--text);font-family:var(--f-body);overflow-x:hidden;transition:background .4s ease,color .4s ease;padding-bottom:0;}
body.has-bottom-nav{padding-bottom:78px;}
@media(max-width:760px){body.has-bottom-nav{padding-bottom:104px;}}
::selection{background:var(--accent);color:#0B0E14;}
a{color:inherit;text-decoration:none;} ul{list-style:none;} button{font-family:inherit;cursor:pointer;} img{max-width:100%;display:block;}
.mono{font-family:var(--f-mono);} .display{font-family:var(--f-display);}
section{position:relative;padding:120px 0;} @media(max-width:768px){section{padding:80px 0;}}
.wrap{max-width:1180px;margin:0 auto;padding:0 32px;}
.eyebrow{font-family:var(--f-mono);font-size:12.5px;letter-spacing:.14em;color:var(--accent);display:inline-flex;align-items:center;gap:9px;margin-bottom:18px;text-transform:uppercase;}
.eyebrow::before{content:'';width:7px;height:7px;border-radius:50%;background:var(--accent);box-shadow:0 0 0 4px var(--accent-soft);}
.section-head{max-width:640px;margin-bottom:56px;}
.section-head h2,.section-head h1{font-family:var(--f-display);font-size:clamp(30px,4vw,44px);font-weight:600;line-height:1.15;letter-spacing:-.01em;}
.section-head p{color:var(--text-muted);font-size:16.5px;margin-top:16px;line-height:1.65;}
#scroll-progress{position:fixed;top:0;left:0;height:2px;background:linear-gradient(90deg,var(--accent),var(--accent-2));z-index:9999;width:0%;transition:width .1s;}

/* LOADER */
#loader{position:fixed;inset:0;background:var(--bg);z-index:10000;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:16px;transition:opacity .5s ease,visibility .5s ease;}
#loader .mark{font-family:var(--f-display);font-weight:700;font-size:26px;letter-spacing:-.02em;display:flex;align-items:center;gap:9px;}
#loader .mark i{width:8px;height:8px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 0 5px var(--accent-2-soft);animation:pulse 1s ease infinite;}
@keyframes pulse{50%{opacity:.4;}}
#loader .bar{width:180px;height:2px;background:var(--border);border-radius:2px;overflow:hidden;}
#loader .bar i.fill{display:block;height:100%;width:0%;background:var(--accent);animation:loadbar .9s ease forwards;}
@keyframes loadbar{to{width:100%;}}
#loader.hide{opacity:0;visibility:hidden;pointer-events:none;}

#cursor-dot{position:fixed;width:8px;height:8px;border-radius:50%;background:var(--accent);pointer-events:none;z-index:9998;transform:translate(-50%,-50%);transition:transform .15s ease;display:none;}
#cursor-ring{position:fixed;width:34px;height:34px;border-radius:50%;border:1px solid var(--border-strong);pointer-events:none;z-index:9998;transform:translate(-50%,-50%);transition:transform .18s ease,width .2s,height .2s,border-color .2s;display:none;}
@media(hover:hover) and (pointer:fine){#cursor-dot,#cursor-ring{display:block;}}
.cursor-trail{position:fixed;width:7px;height:7px;border-radius:50%;background:var(--accent);box-shadow:0 0 12px rgba(255,138,76,.8);pointer-events:none;z-index:9998;transform:translate(-50%,-50%);opacity:0;transition:opacity .4s;}
@media(hover:none) and (pointer:coarse){.cursor-trail{display:none;}}

/* NAV */
nav{position:fixed;top:0;left:0;right:0;z-index:500;padding:18px 0;background:color-mix(in srgb,var(--bg) 72%,transparent);backdrop-filter:blur(14px);border-bottom:1px solid var(--border);transition:border-color .3s,background .3s;}
nav.scrolled{border-bottom:1px solid var(--border);}
nav .row{display:flex;align-items:center;justify-content:space-between;}
.logo{font-family:var(--f-display);font-weight:700;font-size:19px;letter-spacing:-.02em;display:flex;align-items:center;gap:8px;}
.logo i{width:8px;height:8px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 0 4px var(--accent-2-soft);}
.logo-img{width:26px;height:26px;border-radius:7px;display:block;flex:none;}
.nav-links{display:flex;align-items:center;gap:32px;}
.nav-links a{font-size:14.5px;color:var(--text-muted);transition:color .2s;position:relative;}
.nav-links a:hover,.nav-links a.active-link{color:var(--text);}
.nav-links a::after{content:'';position:absolute;bottom:-6px;left:0;width:0;height:1px;background:var(--accent);transition:width .25s;}
.nav-links a:hover::after,.nav-links a.active-link::after{width:100%;}
.nav-right{display:flex;align-items:center;gap:14px;}
.theme-toggle{width:38px;height:38px;border-radius:10px;border:1px solid var(--border);background:var(--surface);display:flex;align-items:center;justify-content:center;color:var(--text-muted);transition:.2s;}
.theme-toggle:hover{border-color:var(--accent);color:var(--accent);}
.btn{display:inline-flex;align-items:center;gap:8px;padding:11px 22px;border-radius:9px;font-size:14px;font-weight:600;border:1px solid transparent;transition:transform .2s,box-shadow .2s,border-color .2s,background .2s;white-space:nowrap;}
.btn:active{transform:scale(.97);}
.btn-primary{background:var(--accent);color:#12100D;}
.btn-primary:hover{box-shadow:0 8px 24px rgba(255,138,76,.35);transform:translateY(-2px);}
.btn-ghost{background:var(--surface);border-color:var(--border);color:var(--text);}
.btn-ghost:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-2px);}
.hamburger{display:none;width:38px;height:38px;border-radius:10px;border:1px solid var(--border);background:var(--surface);align-items:center;justify-content:center;}
@media(max-width:1024px){
  .nav-links.desktop-only{display:none;}
  .hamburger{display:flex;}
}
@media(min-width:1025px){ #navHireDesktop{display:inline-flex !important;} }

/* MOBILE DRAWER */
#drawer-overlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:598;opacity:0;pointer-events:none;transition:opacity .3s;}
#drawer-overlay.open{opacity:1;pointer-events:auto;}
#drawer{position:fixed;top:0;right:0;bottom:0;width:280px;max-width:80vw;background:var(--surface);border-left:1px solid var(--border);z-index:599;transform:translateX(100%);transition:transform .35s cubic-bezier(.22,1,.36,1);padding:100px 28px 28px;}
#drawer.open{transform:translateX(0);}
#drawer ul li{margin-bottom:8px;}
#drawer ul li a{display:block;padding:12px 4px;font-size:16px;color:var(--text-muted);border-bottom:1px solid var(--border);}
#drawer ul li a.active-link,#drawer ul li a:hover{color:var(--accent);}
#drawer-close{position:absolute;top:26px;right:24px;width:36px;height:36px;border-radius:9px;border:1px solid var(--border);background:var(--surface-alt);display:flex;align-items:center;justify-content:center;color:var(--text-muted);}

/* BOTTOM NAV (mobile only) */
.bottom-nav{display:none;position:fixed;bottom:0;left:0;right:0;z-index:600;}
@media(max-width:760px){
  .bottom-nav{display:flex;justify-content:space-around;gap:4px;left:16px;right:16px;bottom:calc(16px + env(safe-area-inset-bottom));padding:6px;border-radius:26px;background:color-mix(in srgb,var(--surface) 76%,transparent);backdrop-filter:blur(22px) saturate(1.5);-webkit-backdrop-filter:blur(22px) saturate(1.5);border:1px solid var(--border-strong);box-shadow:0 22px 48px rgba(0,0,0,.5),0 2px 10px rgba(0,0,0,.28),inset 0 1px 0 rgba(255,255,255,.07);}
}
.bn-item{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:3px;color:var(--text-dim);font-size:10px;font-family:var(--f-mono);padding:7px 4px;border-radius:20px;transition:color .25s,background .25s,transform .2s;flex:1;text-align:center;}
.bn-item svg{opacity:.72;transition:transform .25s,opacity .25s;}
.bn-item:active{transform:scale(.9);}
.bn-item.active{color:var(--accent);background:var(--accent-soft);}
.bn-item.active svg{opacity:1;transform:translateY(-1px);}
.bn-item span{position:relative;}
.bn-item.active span::after{content:'';position:absolute;left:50%;bottom:-4px;transform:translateX(-50%);width:4px;height:4px;border-radius:50%;background:var(--accent);box-shadow:0 0 0 3px var(--accent-soft);}

/* HERO (home) */
#hero{min-height:100svh;display:flex;align-items:center;padding-top:110px;position:relative;overflow:hidden;}
#network-canvas{position:absolute;inset:0;width:100%;height:100%;opacity:.5;}
.grid-overlay{position:absolute;inset:0;background-image:linear-gradient(var(--border) 1px,transparent 1px),linear-gradient(90deg,var(--border) 1px,transparent 1px);background-size:64px 64px;-webkit-mask-image:radial-gradient(ellipse 70% 60% at 50% 30%,#000 10%,transparent 75%);mask-image:radial-gradient(ellipse 70% 60% at 50% 30%,#000 10%,transparent 75%);}
#glow-spot{position:absolute;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(255,138,76,.10),transparent 65%);pointer-events:none;transform:translate(-50%,-50%);transition:left .3s ease,top .3s ease;}
.hero-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:64px;align-items:center;position:relative;z-index:2;}
@media(max-width:960px){.hero-grid{grid-template-columns:1fr;}}
.hero h1{font-family:var(--f-display);font-size:clamp(40px,6vw,68px);font-weight:700;line-height:1.04;letter-spacing:-.02em;margin:20px 0 18px;}
.hero h1 .accent{color:var(--accent);}
#typed-role{font-family:var(--f-mono);font-size:clamp(16px,2vw,20px);color:var(--accent-2);min-height:28px;display:block;margin-bottom:22px;}
.hero p.desc{color:var(--text-muted);font-size:16.5px;max-width:480px;line-height:1.7;margin-bottom:34px;}
.hero-actions{display:flex;gap:14px;flex-wrap:wrap;}
.terminal{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow-glow),0 30px 60px rgba(0,0,0,.35);overflow:hidden;}
.terminal-bar{display:flex;align-items:center;gap:8px;padding:12px 16px;border-bottom:1px solid var(--border);background:var(--surface-alt);}
.terminal-bar span{width:10px;height:10px;border-radius:50%;}
.terminal-bar span:nth-child(1){background:#FF5F57;} .terminal-bar span:nth-child(2){background:#FEBC2E;} .terminal-bar span:nth-child(3){background:#28C840;}
.terminal-bar .path{margin-left:auto;font-family:var(--f-mono);font-size:12px;color:var(--text-dim);}
.terminal-body{padding:22px;font-family:var(--f-mono);font-size:13.5px;line-height:2;min-height:230px;color:var(--text-muted);}
.terminal-body .prompt{color:var(--accent-2);} .terminal-body .ok{color:#5EEAD4;} .terminal-body .out{color:var(--text-dim);display:block;padding-left:18px;}
.cursor-blink{border-right:2px solid var(--accent-2);animation:blink .8s step-end infinite;}
@keyframes blink{50%{border-color:transparent;}}
.scroll-cue{position:absolute;bottom:36px;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:8px;font-family:var(--f-mono);font-size:11px;color:var(--text-dim);letter-spacing:.1em;z-index:2;}
.scroll-cue .line{width:1px;height:36px;background:linear-gradient(var(--accent),transparent);animation:scrolldown 1.8s ease infinite;}
@keyframes scrolldown{0%{opacity:0;transform:scaleY(0);transform-origin:top;}50%{opacity:1;transform:scaleY(1);transform-origin:top;}100%{opacity:0;transform:scaleY(1);transform-origin:bottom;}}

/* PAGE HEADER (interior pages) */
.page-header{padding:150px 0 60px;position:relative;overflow:hidden;}
.page-header .grid-overlay{-webkit-mask-image:radial-gradient(ellipse 60% 100% at 30% 0%,#000 10%,transparent 70%);mask-image:radial-gradient(ellipse 60% 100% at 30% 0%,#000 10%,transparent 70%);}
.breadcrumb{font-family:var(--f-mono);font-size:12px;color:var(--text-dim);margin-bottom:16px;}
.breadcrumb a{color:var(--text-muted);} .breadcrumb a:hover{color:var(--accent);}
.page-header h1{font-family:var(--f-display);font-size:clamp(32px,5vw,52px);font-weight:700;letter-spacing:-.02em;margin-bottom:14px;position:relative;z-index:2;}
.page-header p{color:var(--text-muted);font-size:16px;max-width:560px;position:relative;z-index:2;}

.glass{background:color-mix(in srgb,var(--surface) 88%,transparent);border:1px solid var(--border);border-radius:var(--radius);backdrop-filter:blur(10px);transition:transform .3s ease,border-color .3s ease,box-shadow .3s ease;}
.glass:hover{border-color:var(--border-strong);transform:translateY(-4px);}

/* ABOUT */
.about-grid{display:grid;grid-template-columns:.8fr 1.2fr;gap:64px;align-items:start;}
@media(max-width:900px){.about-grid{grid-template-columns:1fr;}}
.avatar-wrap{position:relative;width:100%;max-width:320px;}
.avatar-ring{position:relative;border-radius:20px;padding:3px;background:conic-gradient(from 0deg,var(--accent),var(--accent-2),var(--accent));animation:spin 6s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
.avatar-inner{background:var(--surface);border-radius:18px;aspect-ratio:1;display:flex;align-items:center;justify-content:center;font-family:var(--f-display);font-size:64px;font-weight:700;color:var(--text-dim);}
.status-chip{position:absolute;bottom:-14px;right:-14px;background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:9px 14px;font-family:var(--f-mono);font-size:12px;display:flex;align-items:center;gap:7px;box-shadow:0 10px 25px rgba(0,0,0,.3);}
.status-chip i{width:7px;height:7px;border-radius:50%;background:#28C840;box-shadow:0 0 0 3px rgba(40,200,64,.2);}
.about-bio p{color:var(--text-muted);line-height:1.8;font-size:15.5px;margin-bottom:16px;}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:32px;}
@media(max-width:640px){.stats-grid{grid-template-columns:repeat(2,1fr);}}
.stat-card{padding:22px 18px;text-align:left;}
.stat-card .num{font-family:var(--f-display);font-size:32px;font-weight:700;color:var(--text);}
.stat-card .num span{color:var(--accent);}
.stat-card .label{font-family:var(--f-mono);font-size:11.5px;color:var(--text-dim);margin-top:6px;letter-spacing:.03em;}

/* SKILLS */
.stack-panel{border-radius:var(--radius);border:1px solid var(--border);background:var(--surface);overflow:hidden;}
.stack-panel-head{padding:16px 22px;border-bottom:1px solid var(--border);font-family:var(--f-mono);font-size:12.5px;color:var(--text-dim);display:flex;justify-content:space-between;background:var(--surface-alt);}
.skills-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:var(--border);}
@media(max-width:768px){.skills-grid{grid-template-columns:1fr;}}
.skill-row{background:var(--surface);padding:20px 24px;transition:background .25s;}
.skill-row:hover{background:var(--surface-alt);}
.skill-top{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:10px;}
.skill-top .name{font-family:var(--f-body);font-weight:600;font-size:14.5px;}
.skill-top .pct{font-family:var(--f-mono);font-size:13px;color:var(--accent-2);}
.skill-bar{height:5px;border-radius:4px;background:var(--border);overflow:hidden;}
.skill-bar i{display:block;height:100%;width:0;border-radius:4px;background:linear-gradient(90deg,var(--accent),var(--accent-2));transition:width 1.4s cubic-bezier(.22,1,.36,1);}
.skill-tag{display:inline-block;font-family:var(--f-mono);font-size:10.5px;color:var(--text-dim);margin-top:8px;letter-spacing:.05em;}

/* SERVICES */
.services-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;}
@media(max-width:900px){.services-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:640px){.services-grid{grid-template-columns:1fr;}}
.service-card{padding:30px 26px;}
.service-card .icon{width:42px;height:42px;border-radius:10px;background:var(--accent-soft);display:flex;align-items:center;justify-content:center;color:var(--accent);margin-bottom:20px;}
.service-card h3{font-family:var(--f-display);font-size:18px;font-weight:600;margin-bottom:10px;}
.service-card p{color:var(--text-muted);font-size:14px;line-height:1.65;}

/* PROJECTS */
.filter-tabs{display:flex;gap:10px;margin-bottom:38px;flex-wrap:wrap;}
.filter-tab{padding:9px 18px;border-radius:8px;border:1px solid var(--border);background:var(--surface);font-family:var(--f-mono);font-size:12.5px;color:var(--text-muted);transition:.2s;}
.filter-tab.active,.filter-tab:hover{border-color:var(--accent);color:var(--accent);background:var(--accent-soft);}
.projects-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:22px;}
@media(max-width:800px){.projects-grid{grid-template-columns:1fr;}}
.repo-card{padding:0;overflow:hidden;}
.repo-thumb{height:170px;background:linear-gradient(135deg,var(--surface-alt),var(--bg-alt));display:flex;align-items:center;justify-content:center;font-family:var(--f-mono);color:var(--text-dim);font-size:13px;border-bottom:1px solid var(--border);position:relative;}
.repo-thumb.video-thumb{height:auto;aspect-ratio:16/9;padding:0;overflow:hidden;}
.repo-thumb.video-thumb iframe{width:100%;height:100%;border:0;display:block;}
.repo-body{padding:22px 24px 24px;}
.repo-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;}
.repo-top h3{font-family:var(--f-display);font-size:18px;font-weight:600;}
.repo-meta{font-family:var(--f-mono);font-size:11.5px;color:var(--text-dim);display:flex;gap:12px;}
.repo-body p{color:var(--text-muted);font-size:14px;line-height:1.6;margin-bottom:16px;}
.badges{display:flex;gap:7px;flex-wrap:wrap;margin-bottom:18px;}
.badge{font-family:var(--f-mono);font-size:10.5px;padding:4px 9px;border-radius:5px;border:1px solid var(--border);color:var(--text-muted);}
.repo-actions{display:flex;gap:10px;}
.repo-actions .btn{padding:8px 16px;font-size:12.5px;}
.pagination{display:flex;justify-content:center;gap:8px;margin-top:44px;}
.page-btn{width:38px;height:38px;border-radius:9px;border:1px solid var(--border);background:var(--surface);display:flex;align-items:center;justify-content:center;font-family:var(--f-mono);font-size:13px;color:var(--text-muted);transition:.2s;}
.page-btn.active,.page-btn:hover{border-color:var(--accent);color:var(--accent);}

/* TIMELINE */
.commit-log{position:relative;padding-left:32px;}
.commit-log::before{content:'';position:absolute;left:6px;top:6px;bottom:6px;width:1px;background:linear-gradient(var(--accent),var(--accent-2),transparent);}
.commit{position:relative;padding-bottom:40px;}
.commit:last-child{padding-bottom:0;}
.commit::before{content:'';position:absolute;left:-32px;top:4px;width:13px;height:13px;border-radius:50%;background:var(--bg);border:2px solid var(--accent);}
.commit-head{display:flex;gap:14px;align-items:baseline;flex-wrap:wrap;margin-bottom:8px;}
.commit-hash{font-family:var(--f-mono);font-size:12px;color:var(--accent-2);background:var(--accent-2-soft);padding:2px 8px;border-radius:5px;}
.commit-date{font-family:var(--f-mono);font-size:12px;color:var(--text-dim);}
.commit h3{font-family:var(--f-display);font-size:19px;font-weight:600;}
.commit .role{color:var(--text-muted);font-size:14px;margin-bottom:10px;}
.commit ul li{font-size:14px;color:var(--text-muted);line-height:1.8;padding-left:20px;position:relative;}
.commit ul li::before{content:'+';position:absolute;left:0;color:var(--accent-2);font-family:var(--f-mono);font-weight:700;}
.commit .tech-row{display:flex;gap:7px;flex-wrap:wrap;margin-top:12px;}

/* BLOG */
.blog-toolbar{display:flex;justify-content:space-between;align-items:center;gap:20px;margin-bottom:36px;flex-wrap:wrap;}
.search-box{position:relative;flex:1;min-width:220px;max-width:340px;}
.search-box input{width:100%;background:var(--surface);border:1px solid var(--border);border-radius:9px;padding:11px 14px 11px 40px;color:var(--text);font-size:14px;}
.search-box input:focus{outline:none;border-color:var(--accent);}
.search-box svg{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--text-dim);}
.blog-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;}
@media(max-width:900px){.blog-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:640px){.blog-grid{grid-template-columns:1fr;}}
.blog-card{overflow:hidden;padding:0;}
.blog-thumb{height:150px;background:linear-gradient(135deg,var(--surface-alt),var(--bg-alt));display:flex;align-items:center;justify-content:center;color:var(--text-dim);font-family:var(--f-mono);font-size:12px;border-bottom:1px solid var(--border);}
.blog-body{padding:20px 22px 22px;}
.blog-cat{font-family:var(--f-mono);font-size:10.5px;color:var(--accent);text-transform:uppercase;letter-spacing:.06em;}
.blog-body h3{font-family:var(--f-display);font-size:16.5px;font-weight:600;margin:10px 0 8px;line-height:1.35;}
.blog-body p{color:var(--text-muted);font-size:13.5px;line-height:1.6;margin-bottom:14px;}
.blog-meta{display:flex;justify-content:space-between;align-items:center;font-family:var(--f-mono);font-size:11px;color:var(--text-dim);}
.blog-meta a{color:var(--accent-2);}
.tag-row{display:flex;gap:6px;flex-wrap:wrap;margin-top:44px;}
.tag-pill{font-family:var(--f-mono);font-size:11.5px;padding:6px 13px;border-radius:20px;border:1px solid var(--border);color:var(--text-muted);}

/* CONTACT */
.contact-grid{display:grid;grid-template-columns:1fr 1.3fr;gap:48px;}
@media(max-width:900px){.contact-grid{grid-template-columns:1fr;}}
.contact-info-card{padding:32px;}
.contact-item{display:flex;gap:14px;align-items:flex-start;margin-bottom:24px;}
.contact-item .ic{width:38px;height:38px;border-radius:9px;background:var(--accent-soft);color:var(--accent);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.contact-item .lbl{font-family:var(--f-mono);font-size:11px;color:var(--text-dim);letter-spacing:.05em;}
.contact-item .val{font-size:14.5px;margin-top:2px;}
.social-row{display:flex;gap:10px;margin-top:22px;}
.social-row a{width:38px;height:38px;border-radius:9px;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);transition:.2s;}
.social-row a:hover{border-color:var(--accent);color:var(--accent);}
.form-card{padding:36px;}
.field{margin-bottom:20px;}
.field label{display:block;font-family:var(--f-mono);font-size:11.5px;color:var(--text-dim);margin-bottom:8px;letter-spacing:.05em;}
.field input,.field textarea{width:100%;background:var(--bg-alt);border:1px solid var(--border);border-radius:9px;padding:13px 15px;color:var(--text);font-family:var(--f-body);font-size:14.5px;transition:border-color .2s;}
.field input:focus,.field textarea:focus{outline:none;border-color:var(--accent);}
.field textarea{resize:vertical;min-height:120px;}
.field.error input,.field.error textarea{border-color:var(--danger);}
.field .err-msg{font-family:var(--f-mono);font-size:11px;color:var(--danger);margin-top:6px;display:none;}
.field.error .err-msg{display:block;}
.map-box{margin-top:20px;height:220px;border-radius:var(--radius);border:1px solid var(--border);background:repeating-linear-gradient(45deg,var(--surface-alt),var(--surface-alt) 10px,var(--surface) 10px,var(--surface) 20px);display:flex;align-items:center;justify-content:center;color:var(--text-dim);font-family:var(--f-mono);font-size:12.5px;}

/* FOOTER */
footer{border-top:1px solid var(--border);padding:56px 0 30px;}
.footer-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1.2fr;gap:40px;margin-bottom:44px;}
@media(max-width:800px){.footer-grid{grid-template-columns:1fr 1fr;}}
.footer-grid h4{font-family:var(--f-mono);font-size:12px;color:var(--text-dim);letter-spacing:.08em;margin-bottom:18px;text-transform:uppercase;}
.footer-grid ul li{margin-bottom:11px;}
.footer-grid ul li a{color:var(--text-muted);font-size:14px;transition:color .2s;}
.footer-grid ul li a:hover{color:var(--accent);}
.footer-bottom{display:flex;justify-content:space-between;align-items:center;padding-top:22px;border-top:none;font-size:13px;color:var(--text-dim);flex-wrap:wrap;gap:14px;}
.newsletter-row{display:flex;gap:8px;margin-top:8px;align-items:center;}
.newsletter-row input{flex:1;background:var(--bg-alt);border:1px solid var(--border);border-radius:8px;padding:10px 12px;color:var(--text);font-size:13.5px;transition:border-color .18s,box-shadow .18s,background .18s;}
.newsletter-row input::placeholder{color:var(--text-dim);opacity:1}
.newsletter-row input:focus{outline:none;border-color:var(--accent);box-shadow:0 8px 30px rgba(255,138,76,.08);background:color-mix(in srgb,var(--bg-alt) 92%,transparent);}
.newsletter-row button{padding:10px 16px;border-radius:8px;background:var(--accent);color:#0B0E14;border:0;transition:transform .12s,box-shadow .12s;}
.newsletter-row button:hover{transform:translateY(-2px);box-shadow:0 12px 30px rgba(255,138,76,.18);background:linear-gradient(90deg,var(--accent),var(--accent-2));}
@media(max-width:520px){.newsletter-row{flex-direction:column;gap:8px}.newsletter-row button{width:100%}.newsletter-row input{width:100%;}}

#back-to-top{position:fixed;bottom:28px;right:28px;width:46px;height:46px;border-radius:12px;background:var(--surface);border:1px solid var(--border);color:var(--text);display:flex;align-items:center;justify-content:center;z-index:400;opacity:0;pointer-events:none;transition:opacity .3s,transform .3s,border-color .2s;}
#back-to-top.show{opacity:1;pointer-events:auto;}
#back-to-top:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-3px);}
@media(max-width:760px){#back-to-top{bottom:88px;}}
@media(prefers-reduced-motion: reduce){*{animation-duration:.001ms !important;transition-duration:.001ms !important;}}
</style>
<link rel="stylesheet" href="/css/mobile-overrides.css">
</head>
<div id="scroll-progress"></div>
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>
<div id="loader">
  <div class="mark"><i></i>muhammadbinimran<span style="color:var(--text-dim);font-weight:500;">.online</span></div>
  <div class="bar"><i class="fill"></i></div>
</div>

<nav id="nav">
  <div class="wrap row">
    <a href="{{ route('index') }}" class="logo"><img src="{{ asset('favicon.svg') }}" alt="MBI" class="logo-img">muhammadbinimran<span style="color:var(--text-dim);font-weight:500;">.online</span></a>
    <ul class="nav-links desktop-only">
      <li><a href="{{ route('index') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('skills') }}">Skills</a></li>
      <li><a href="{{ route('services') }}">Services</a></li>
      <li><a href="{{ route('projects') }}" class="active-link">Work</a></li>
      <li><a href="{{ route('blog') }}">Blog</a></li>
      <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
    <div class="nav-right">
      <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
        <svg id="themeIcon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
      </button>
      <a href="{{ route('contact') }}" class="btn btn-primary desktop-only" style="display:inline-flex;">Hire Me</a>
      <button class="hamburger" id="hamburger" aria-label="Menu">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
      </button>
    </div>
  </div>
</nav>

<div id="drawer-overlay"></div>
<div id="drawer">
  <button id="drawer-close" aria-label="Close menu">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18M6 6l12 12"/></svg>
  </button>
  <ul>
    <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('skills') }}">Skills</a></li>
        <li><a href="{{ route('services') }}">Services</a></li>
        <li><a href="{{ route('projects') }}" class="active-link">Work</a></li>
        <li><a href="{{ route('blog') }}">Blog</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
  </ul>
  <a href="{{ route('contact') }}" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:18px;">Hire Me</a>
</div>

<section class="page-header">
  <div class="grid-overlay"></div>
  <div class="wrap">
    <div class="breadcrumb"><a href="{{ route('index') }}">Home</a> / Work</div>
    <h1>Featured Projects</h1>
    <p>Selected repositories, filterable by stack.</p>
  </div>
</section>

<section id="projects" style="padding-top:20px;">
  <div class="wrap">
@php
function videoEmbedUrl($url) {
    if (!$url) return null;
    if (preg_match('~^https?://.*(youtube\.com|youtu\.be)~', $url)) {
        parse_str((string) parse_url($url, PHP_URL_QUERY), $q);
        if (!empty($q['v'])) return 'https://www.youtube.com/embed/' . $q['v'];
        if (preg_match('~(?:youtu\.be/|youtube\.com/embed/)([a-zA-Z0-9_-]{6,})~', $url, $m)) return 'https://www.youtube.com/embed/' . $m[1];
    }
    if (preg_match('~vimeo\.com~', $url)) {
        if (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $m)) return 'https://player.vimeo.com/video/' . $m[1];
    }
    return $url;
}
@endphp
    <div class="filter-tabs" id="filterTabs">
      <button class="filter-tab active" data-filter="all">All</button>
      <button class="filter-tab" data-filter="laravel">Laravel</button>
      <button class="filter-tab" data-filter="go">Go</button>
      <button class="filter-tab" data-filter="js">JavaScript</button>
      <button class="filter-tab" data-filter="fullstack">Full Stack</button>
    </div>
    <div class="projects-grid" id="projectsGrid">
      @forelse($projects ?? [] as $project)
      <div class="glass repo-card" data-cat="{{ strtolower($project->category ?? 'other') }}" data-aos="fade-up">
        @php $embed = videoEmbedUrl($project->video ?? ''); @endphp
        @if($embed)
        <div class="repo-thumb video-thumb">
          <iframe src="{{ $embed }}" title="{{ $project->title ?? $project->name ?? 'Project video' }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
        @else
        <div class="repo-thumb">{{ $project->image ?? 'project-preview.png' }}</div>
        @endif
        <div class="repo-body">
          <div class="repo-top">
            <h3>{{ $project->title ?? $project->name ?? 'Untitled' }}</h3>
            @if($project->stars || $project->forks)
            <div class="repo-meta">
              @if($project->stars)
              <span>★ {{ $project->stars }}</span>
              @endif
              @if($project->forks)
              <span>⑂ {{ $project->forks }}</span>
              @endif
            </div>
            @endif
          </div>
          <p>{{ $project->description ?? '' }}</p>
          @if($project->tech || $project->technologies)
          <div class="badges">
            @php $techs = explode(',', $project->technologies ?? $project->tech ?? ''); @endphp
            @foreach($techs as $tech)
            @if(trim($tech))
            <span class="badge">{{ trim($tech) }}</span>
            @endif
            @endforeach
          </div>
          @endif
          <div class="repo-actions">
            @if($project->github)
            <a href="https://github.com/muhammadbinimran407-tech" class="btn btn-ghost">GitHub</a>
            @endif
            @if($project->demo || $project->url)
            <a href="{{ $project->url ?? $project->demo }}" class="btn btn-primary">Live Demo</a>
            @endif
          </div>
        </div>
      </div>
      @empty
      <p style="grid-column: 1 / -1; text-align: center; color: var(--text-muted);">No projects yet. Add some from the admin panel.</p>
      @endforelse
    </div>
    <div class="pagination">
      <button class="page-btn active">1</button>
      <button class="page-btn">2</button>
      <button class="page-btn">3</button>
      <button class="page-btn">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 6l6 6-6 6"/></svg>
      </button>
    </div>
  </div>
</section>

<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div>
    <a href="{{ route('index') }}" class="logo"><img src="{{ asset('favicon.svg') }}" alt="MBI" class="logo-img">muhammadbinimran<span style="color:var(--text-dim);font-weight:500;">.online</span></a>
        <p style="color:var(--text-muted);font-size:14px;margin-top:14px;max-width:280px;line-height:1.7;">Full stack web developer building reliable Laravel and Go systems.</p>
      </div>
      <div>
        <h4>Quick Links</h4>
        <ul><li><a href="{{ route('about') }}">About</a></li><li><a href="{{ route('skills') }}">Skills</a></li><li><a href="{{ route('projects') }}">Work</a></li><li><a href="{{ route('contact') }}">Contact</a></li></ul>
      </div>
      <div>
        <h4>Services</h4>
        <ul><li><a href="{{ route('services') }}">Laravel Dev</a></li><li><a href="{{ route('services') }}">Go Backend</a></li><li><a href="{{ route('services') }}">REST APIs</a></li><li><a href="{{ route('services') }}">Deployment</a></li></ul>
      </div>
      <div>
        <h4>Newsletter</h4>
        <p style="color:var(--text-muted);font-size:13.5px;">Occasional notes on backend engineering. No spam.</p>
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-row">
          @csrf
          <input type="email" name="email" placeholder="you@email.com" required>
          <button type="submit" class="btn btn-primary" style="padding:10px 16px;">Join</button>
        </form>
        @if(session('newsletter_success'))
          <div style="margin-top:8px;color:var(--accent);font-family:var(--f-mono);font-size:13px;">{{ session('newsletter_success') }}</div>
        @endif
        @error('email') <div style="margin-top:8px;color:var(--danger);font-family:var(--f-mono);font-size:13px;">{{ $message }}</div> @enderror
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 Muhammad Bin Imran. All rights reserved.</span>
      <span class="mono" style="color:var(--text-dim);">Built with Laravel &amp; Tailwind CSS</span>
    </div>
  </div>
</footer>

<button id="back-to-top" aria-label="Back to top">
  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<nav class="bottom-nav">
  <a href="{{ route('index') }}" class="bn-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/></svg>
        <span>Home</span>
      </a>
      <a href="{{ route('about') }}" class="bn-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
        <span>About</span>
      </a>
      <a href="{{ route('projects') }}" class="bn-item active">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 17l6-6-6-6M12 19h8"/></svg>
        <span>Work</span>
      </a>
      <a href="{{ route('blog') }}" class="bn-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
        <span>Blog</span>
      </a>
      <a href="{{ route('contact') }}" class="bn-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M4 6l8 7 8-7"/></svg>
        <span>Contact</span>
      </a>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.16/typed.umd.min.js"></script>
<script>
document.body.classList.toggle('has-bottom-nav', true);

window.addEventListener('load', () => {
  setTimeout(() => document.getElementById('loader').classList.add('hide'), 700);
});

const root = document.documentElement;
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
function setTheme(t){
  root.setAttribute('data-theme', t);
  themeIcon.innerHTML = t === 'light'
    ? '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>'
    : '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>';
}
setTheme('dark');
themeToggle.addEventListener('click', () => {
  setTheme(root.getAttribute('data-theme') === 'light' ? 'dark' : 'light');
});

const hamburger = document.getElementById('hamburger');
const drawer = document.getElementById('drawer');
const drawerOverlay = document.getElementById('drawer-overlay');
const drawerClose = document.getElementById('drawer-close');
function openDrawer(){ drawer.classList.add('open'); drawerOverlay.classList.add('open'); }
function closeDrawer(){ drawer.classList.remove('open'); drawerOverlay.classList.remove('open'); }
hamburger.addEventListener('click', openDrawer);
drawerClose.addEventListener('click', closeDrawer);
drawerOverlay.addEventListener('click', closeDrawer);

const progress = document.getElementById('scroll-progress');
const navEl = document.getElementById('nav');
const backTop = document.getElementById('back-to-top');
window.addEventListener('scroll', () => {
  const h = document.documentElement;
  const pct = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
  progress.style.width = pct + '%';
  navEl.classList.toggle('scrolled', h.scrollTop > 20);
  backTop.classList.toggle('show', h.scrollTop > 500);
});
backTop.addEventListener('click', () => window.scrollTo({top:0, behavior:'smooth'}));

const dot = document.getElementById('cursor-dot');
const ring = document.getElementById('cursor-ring');
let mx=0,my=0, rx=0, ry=0;
window.addEventListener('mousemove', e => {
  mx = e.clientX; my = e.clientY;
  dot.style.left = mx+'px'; dot.style.top = my+'px';
});
(function loop(){
  rx += (mx-rx)*0.15; ry += (my-ry)*0.15;
  ring.style.left = rx+'px'; ring.style.top = ry+'px';
  requestAnimationFrame(loop);
})();
document.querySelectorAll('a,button').forEach(el=>{
  el.addEventListener('mouseenter', ()=>{ring.style.width='50px';ring.style.height='50px';ring.style.borderColor='var(--accent)';});
  el.addEventListener('mouseleave', ()=>{ring.style.width='34px';ring.style.height='34px';ring.style.borderColor='var(--border-strong)';});
});

const trailDots=[];
for(let i=0;i<10;i++){const t=document.createElement('div');t.className='cursor-trail';document.body.appendChild(t);trailDots.push({el:t,x:0,y:0,s:1-i*0.055,a:1-i*0.085});}
let tx=0,ty=0,trailOn=false;
window.addEventListener('mousemove',e=>{
  tx=e.clientX;ty=e.clientY;
  if(!trailOn){trailOn=true;trailDots.forEach(d=>{d.x=tx;d.y=ty;d.el.style.opacity=d.a;});}
});
(function trailLoop(){
  let px=tx,py=ty;
  trailDots.forEach(d=>{
    d.x+=(px-d.x)*d.s; d.y+=(py-d.y)*d.s;
    d.el.style.left=d.x+'px'; d.el.style.top=d.y+'px';
    d.el.style.opacity=d.a;
    px=d.x; py=d.y;
  });
  requestAnimationFrame(trailLoop);
})();

AOS.init({duration:700, easing:'ease-out-cubic', once:true, offset:60});
gsap.registerPlugin(ScrollTrigger);
gsap.utils.toArray('.section-head').forEach(el=>{
  gsap.from(el, {y:30, opacity:0, duration:.8, ease:'power3.out', scrollTrigger:{trigger:el, start:'top 85%'}});
});


const tabs = document.querySelectorAll('.filter-tab');
const cards = document.querySelectorAll('.repo-card');
tabs.forEach(tab=>{
  tab.addEventListener('click', ()=>{
    tabs.forEach(t=>t.classList.remove('active'));
    tab.classList.add('active');
    const f = tab.dataset.filter;
    cards.forEach(card=>{
      const show = f==='all' || card.dataset.cat.includes(f);
      card.style.display = show ? '' : 'none';
    });
  });
});

</script>
</body>
</html>