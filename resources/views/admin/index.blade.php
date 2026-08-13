<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<title>Admin Panel — Muhammad Bin Imran</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css">
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
  --danger:#FF6B6B; --danger-soft:rgba(255,107,107,.14);
  --success:#28C840; --success-soft:rgba(40,200,64,.14);
  --f-display:'Space Grotesk',sans-serif; --f-body:'Inter',sans-serif; --f-mono:'JetBrains Mono',monospace;
  --radius:12px;
}
html[data-theme="light"]{
  --bg:#F5F6F8; --bg-alt:#EDEFF3; --surface:#FFFFFF; --surface-alt:#F7F8FA;
  --border:rgba(10,14,25,.09); --border-strong:rgba(10,14,25,.16);
  --text:#12161F; --text-muted:#5A6272; --text-dim:#8B93A6;
}
*{margin:0;padding:0;box-sizing:border-box;}
body{background:var(--bg);color:var(--text);font-family:var(--f-body);transition:background .3s,color .3s;}
a{color:inherit;text-decoration:none;} ul{list-style:none;} button{font-family:inherit;cursor:pointer;}
::selection{background:var(--accent);color:#0B0E14;}
.mono{font-family:var(--f-mono);}
input,select,textarea{font-family:var(--f-body);}

/* ===== LOGIN ===== */
#loginScreen{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;position:relative;overflow:hidden;}
#loginScreen .grid-bg{position:absolute;inset:0;background-image:linear-gradient(var(--border) 1px,transparent 1px),linear-gradient(90deg,var(--border) 1px,transparent 1px);background-size:56px 56px;-webkit-mask-image:radial-gradient(ellipse 60% 60% at 50% 40%,#000 10%,transparent 75%);mask-image:radial-gradient(ellipse 60% 60% at 50% 40%,#000 10%,transparent 75%);}
.login-card{position:relative;z-index:2;width:100%;max-width:400px;background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:36px 32px;box-shadow:0 30px 60px rgba(0,0,0,.35);}
.login-logo{display:flex;align-items:center;gap:8px;font-family:var(--f-display);font-weight:700;font-size:19px;margin-bottom:6px;}
.login-logo i{width:8px;height:8px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 0 4px var(--accent-2-soft);}
.login-sub{font-family:var(--f-mono);font-size:12px;color:var(--text-dim);margin-bottom:28px;}
.field{margin-bottom:18px;}
.field label{display:block;font-family:var(--f-mono);font-size:11px;color:var(--text-dim);margin-bottom:7px;letter-spacing:.05em;}
.field input,.field select,.field textarea{width:100%;background:var(--bg-alt);border:1px solid var(--border);border-radius:9px;padding:11px 14px;color:var(--text);font-size:14px;transition:border-color .2s;}
.field input:focus,.field select:focus,.field textarea:focus{outline:none;border-color:var(--accent);}
.field textarea{resize:vertical;min-height:90px;}
.field .err-msg{font-family:var(--f-mono);font-size:11px;color:var(--danger);margin-top:6px;display:none;}
.field.error input{border-color:var(--danger);}
.field.error .err-msg{display:block;}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:11px 20px;border-radius:10px;font-size:13.5px;font-weight:600;border:1px solid transparent;white-space:nowrap;cursor:pointer;transition:transform .15s ease,box-shadow .2s ease,background .2s ease,border-color .2s ease,color .2s ease;}
.btn:focus-visible{outline:2px solid var(--accent);outline-offset:2px;}
.btn:active{transform:scale(.96);}
.btn-primary{background:linear-gradient(135deg,#FF8A4C,#FF6A5E);color:#12100D;box-shadow:0 4px 14px rgba(255,138,76,.22);}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 10px 26px rgba(255,138,76,.38);}
.btn-ghost{background:var(--surface-alt);border-color:var(--border);color:var(--text);}
.btn-ghost:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-1px);}
.btn-danger{background:var(--danger-soft);color:var(--danger);}
.btn-danger:hover{background:var(--danger);color:#fff;box-shadow:0 8px 20px rgba(255,107,107,.3);}
.btn-sm{padding:7px 12px;font-size:12px;border-radius:8px;}
.btn-icon{width:34px;height:34px;padding:0;border-radius:9px;}
.btn-icon:hover{transform:translateY(-1px);}
.login-hint{font-family:var(--f-mono);font-size:11px;color:var(--text-dim);margin-top:18px;text-align:center;line-height:1.7;}

/* ===== ADMIN SHELL ===== */
#adminShell{display:none;}
#adminShell.show{display:flex;min-height:100vh;}

/* ADMIN SIDEBAR */
.admin-sidebar{width:240px;flex-shrink:0;background:var(--surface);border-right:1px solid var(--border);display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto;z-index:310;}
.admin-sidebar .admin-nav{display:flex;flex-direction:column;gap:2px;padding:14px 12px;flex:1;position:static;top:auto;left:auto;right:auto;bottom:auto;height:auto;z-index:auto;background:transparent;}
.admin-sidebar .admin-nav a{display:flex;align-items:center;gap:10px;padding:11px 13px;border-radius:9px;color:var(--text-muted);font-size:13.5px;font-weight:500;white-space:nowrap;transition:.15s;position:relative;}
.admin-sidebar .admin-nav a svg{flex-shrink:0;}
.admin-sidebar .admin-nav a:hover{background:var(--surface-alt);color:var(--text);}
.admin-sidebar .admin-nav a.active{background:var(--accent-soft);color:var(--accent);}
.admin-sidebar .admin-nav a.active::after{content:'';position:absolute;left:0;top:9px;bottom:9px;width:3px;border-radius:3px;background:var(--accent);}
.admin-sidebar .admin-nav a .count{margin-left:auto;font-family:var(--f-mono);font-size:10px;background:var(--surface-alt);padding:1px 6px;border-radius:10px;color:var(--text-dim);}
.admin-sidebar .admin-nav a.active .count{background:var(--accent-soft);color:var(--accent);}

/* ADMIN TOP NAVBAR */
.admin-main{display:flex;flex-direction:column;flex:1;min-width:0;}
.admin-navbar{position:sticky;top:0;z-index:300;background:var(--surface);border-bottom:1px solid var(--border);}
.nav-inner{max-width:1500px;margin:0 auto;padding:0 24px;height:62px;display:flex;align-items:center;gap:18px;justify-content:space-between;}
.nav-left{display:flex;align-items:center;gap:14px;flex-shrink:0;}
.nav-brand{display:flex;align-items:center;gap:8px;font-family:var(--f-display);font-weight:700;font-size:17px;color:var(--text);white-space:nowrap;}
.nav-brand i{width:8px;height:8px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 0 4px var(--accent-2-soft);}
.nav-brand span{color:var(--text-dim);font-weight:500;}

.nav-right{display:flex;align-items:center;gap:10px;flex-shrink:0;}
.user-chip{display:flex;align-items:center;gap:9px;padding:5px 10px 5px 5px;border-radius:11px;border:1px solid var(--border);background:var(--bg-alt);}
.user-chip .avatar-sm{width:30px;height:30px;border-radius:8px;font-size:12px;}
.user-meta{display:flex;flex-direction:column;line-height:1.2;}
.user-name{font-size:12.5px;font-weight:600;white-space:nowrap;}
.user-role{font-family:var(--f-mono);font-size:9.5px;color:var(--text-dim);}
.avatar-sm{width:34px;height:34px;border-radius:9px;background:var(--accent-soft);color:var(--accent);display:flex;align-items:center;justify-content:center;font-family:var(--f-display);font-weight:700;font-size:13px;flex-shrink:0;}

.icon-btn{width:38px;height:38px;border-radius:9px;border:1px solid var(--border);background:var(--surface);display:flex;align-items:center;justify-content:center;color:var(--text-muted);transition:.2s;position:relative;}
.icon-btn:hover{border-color:var(--accent);color:var(--accent);}
.icon-btn .dot{position:absolute;top:6px;right:6px;width:7px;height:7px;border-radius:50%;background:var(--accent);border:2px solid var(--surface);}
.hamburger-admin{display:none;width:38px;height:38px;border-radius:9px;border:1px solid var(--border);background:var(--surface);align-items:center;justify-content:center;color:var(--text-muted);}

.main-content{flex:1;width:100%;min-width:0;}
.content-area{padding:28px;}
.view{display:none;}
.view.active{display:block;animation:fadein .3s ease;}
@keyframes fadein{from{opacity:0;transform:translateY(6px);}to{opacity:1;transform:translateY(0);}}
.view-head{display:flex;justify-content:space-between;align-items:flex-start;gap:16px;margin-bottom:26px;flex-wrap:wrap;}
.view-head h2{font-family:var(--f-display);font-size:24px;font-weight:600;}
.view-head p{color:var(--text-muted);font-size:13.5px;margin-top:4px;}

/* KPI */
.kpi-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px;}
@media(max-width:900px){.kpi-grid{grid-template-columns:repeat(2,1fr);}}
.kpi-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:20px;}
.kpi-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px;}
.kpi-icon{width:36px;height:36px;border-radius:9px;display:flex;align-items:center;justify-content:center;}
.kpi-num{font-family:var(--f-display);font-size:26px;font-weight:700;}
.kpi-label{font-family:var(--f-mono);font-size:11px;color:var(--text-dim);margin-top:2px;}
.kpi-trend{font-family:var(--f-mono);font-size:11px;color:var(--success);}

.panel{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;margin-bottom:20px;}
.panel-head{padding:16px 20px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;font-family:var(--f-mono);font-size:12px;color:var(--text-dim);}
.panel-body{padding:20px;}
.chart-grid{display:grid;grid-template-columns:1.6fr 1fr;gap:20px;}
@media(max-width:1000px){.chart-grid{grid-template-columns:1fr;}}

/* TABLE */
.table-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;min-width:640px;}
thead th{text-align:left;font-family:var(--f-mono);font-size:11px;color:var(--text-dim);text-transform:uppercase;letter-spacing:.05em;padding:12px 20px;border-bottom:1px solid var(--border);background:var(--surface-alt);}
tbody td{padding:14px 20px;border-bottom:1px solid var(--border);font-size:13.5px;}
tbody tr:last-child td{border-bottom:none;}
tbody tr:hover{background:var(--surface-alt);}
.cell-title{font-weight:600;}
.cell-sub{color:var(--text-dim);font-size:12px;font-family:var(--f-mono);margin-top:2px;}
.badge{display:inline-block;font-family:var(--f-mono);font-size:10.5px;padding:3px 9px;border-radius:5px;border:1px solid var(--border);color:var(--text-muted);}
.status-pill{font-family:var(--f-mono);font-size:10.5px;padding:3px 10px;border-radius:20px;}
.status-published,.status-featured,.status-read{background:var(--success-soft);color:var(--success);}
.status-draft,.status-unread{background:var(--accent-soft);color:var(--accent);}
.row-actions{display:flex;gap:6px;justify-content:flex-end;}
.stars{color:var(--accent);font-size:13px;letter-spacing:1px;}

.toolbar{display:flex;justify-content:space-between;align-items:center;gap:14px;margin-bottom:18px;flex-wrap:wrap;}
.search-mini{position:relative;width:240px;}
.search-mini input{width:100%;background:var(--surface);border:1px solid var(--border);border-radius:9px;padding:9px 12px 9px 34px;color:var(--text);font-size:13px;}
.search-mini svg{position:absolute;left:10px;top:50%;transform:translateY(-50%);color:var(--text-dim);}

/* MODAL */
#modalOverlay{position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:900;display:none;align-items:center;justify-content:center;padding:20px;}
#modalOverlay.show{display:flex;}
.modal{width:100%;max-width:520px;max-height:88vh;overflow-y:auto;background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:26px;box-shadow:0 30px 60px rgba(0,0,0,.4);}
.modal-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;}
.modal-head h3{font-family:var(--f-display);font-size:18px;font-weight:600;}
.modal-close{width:32px;height:32px;border-radius:8px;border:1px solid var(--border);background:var(--surface-alt);color:var(--text-muted);display:flex;align-items:center;justify-content:center;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.toggle-row{display:flex;align-items:center;justify-content:space-between;background:var(--bg-alt);border:1px solid var(--border);border-radius:9px;padding:12px 14px;margin-bottom:18px;}
.switch{position:relative;width:40px;height:22px;}
.switch input{opacity:0;width:0;height:0;}
.slider-tog{position:absolute;inset:0;background:var(--border-strong);border-radius:20px;cursor:pointer;transition:.2s;}
.slider-tog::before{content:'';position:absolute;width:16px;height:16px;left:3px;top:3px;background:#fff;border-radius:50%;transition:.2s;}
.switch input:checked + .slider-tog{background:var(--accent);}
.switch input:checked + .slider-tog::before{transform:translateX(18px);}
.range-row{display:flex;align-items:center;gap:12px;}
.range-row input[type=range]{flex:1;accent-color:var(--accent);}
.range-val{font-family:var(--f-mono);font-size:13px;color:var(--accent-2);width:42px;text-align:right;}

/* UPLOAD FIELD */
.upload-wrap{display:flex;flex-direction:column;gap:10px;}
.upload-row{display:flex;gap:8px;}
.upload-row .upload-url{flex:1;min-width:0;}
.upload-preview{display:flex;align-items:center;gap:10px;background:var(--bg-alt);border:1px dashed var(--border-strong);border-radius:9px;padding:8px;min-height:66px;}
.upload-preview img,.upload-preview video{height:56px;border-radius:6px;object-fit:cover;max-width:140px;border:1px solid var(--border);}
.upload-preview .no-media{font-family:var(--f-mono);font-size:11px;color:var(--text-dim);}
.upload-preview .thumb-link{font-family:var(--f-mono);font-size:11px;color:var(--accent-2);display:flex;align-items:center;gap:6px;word-break:break-all;}
.thumb-sm{width:54px;height:38px;object-fit:cover;border-radius:6px;border:1px solid var(--border);display:block;background:var(--surface-alt);}

/* MESSAGES */
.msg-item{display:flex;gap:14px;padding:16px 20px;border-bottom:1px solid var(--border);cursor:pointer;transition:.15s;}
.msg-item:hover{background:var(--surface-alt);}
.msg-item:last-child{border-bottom:none;}
.msg-avatar{width:40px;height:40px;border-radius:9px;background:var(--accent-2-soft);color:var(--accent-2);display:flex;align-items:center;justify-content:center;font-family:var(--f-display);font-weight:700;font-size:14px;flex-shrink:0;}
.msg-body{flex:1;min-width:0;}
.msg-top{display:flex;justify-content:space-between;gap:10px;}
.msg-name{font-weight:600;font-size:14px;}
.msg-date{font-family:var(--f-mono);font-size:11px;color:var(--text-dim);white-space:nowrap;}
.msg-preview{color:var(--text-muted);font-size:13px;margin-top:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.msg-email{font-family:var(--f-mono);font-size:11.5px;color:var(--text-dim);}

/* MEDIA */
.upload-zone{border:1.5px dashed var(--border-strong);border-radius:var(--radius);padding:40px;text-align:center;color:var(--text-muted);margin-bottom:22px;transition:.2s;}
.upload-zone:hover{border-color:var(--accent);color:var(--accent);}
.media-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:14px;}
.media-item{background:var(--surface);border:1px solid var(--border);border-radius:10px;overflow:hidden;}
.media-thumb{height:90px;background:var(--surface-alt);display:flex;align-items:center;justify-content:center;color:var(--text-dim);}
.media-info{padding:9px 10px;}
.media-name{font-size:11.5px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.media-size{font-family:var(--f-mono);font-size:10px;color:var(--text-dim);}

/* SETTINGS */
.settings-tabs{display:flex;gap:8px;margin-bottom:22px;border-bottom:1px solid var(--border);}
.settings-tab{padding:10px 16px;font-size:13.5px;color:var(--text-muted);border-bottom:2px solid transparent;margin-bottom:-1px;}
.settings-tab.active{color:var(--accent);border-color:var(--accent);}
.settings-panel{display:none;}
.settings-panel.active{display:block;}

.empty-state{text-align:center;padding:50px 20px;color:var(--text-dim);}
.empty-state svg{margin-bottom:14px;opacity:.4;}

@media(max-width:960px){
  .nav-inner{padding:0 14px;height:58px;gap:12px;}
  .admin-sidebar{position:fixed;top:0;left:0;bottom:0;width:min(80vw,280px);height:100vh;transform:translateX(-100%);transition:transform .3s ease;box-shadow:0 20px 40px rgba(0,0,0,.4);border-right:1px solid var(--border);}
  .admin-sidebar.open{transform:translateX(0);}
  .hamburger-admin{display:flex;}
  .nav-left{gap:10px;}
  #sidebarOverlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:290;opacity:0;pointer-events:none;transition:.3s;}
  #sidebarOverlay.show{opacity:1;pointer-events:auto;}
  .form-row{grid-template-columns:1fr;}
}
@media(max-width:560px){
  .nav-inner{padding:0 10px;gap:8px;}
  .nav-brand{font-size:13px;}
  .nav-brand span{display:none;}
  .nav-right{gap:6px;}
  .icon-btn{width:34px;height:34px;flex-shrink:0;}
  .user-chip{display:none;}
  #viewSiteBtn{width:34px;padding:0;justify-content:center;flex-shrink:0;}
  #viewSiteBtn .view-site-label{display:none;}
  .content-area{padding:18px 14px;}
  .kpi-grid{grid-template-columns:repeat(2,1fr);gap:10px;}
  .kpi-card{padding:14px;}
  .view-head h2{font-size:20px;}
}
.toastify{border-radius:9px !important;font-family:var(--f-mono) !important;font-size:13px !important;}
</style>
</head>
<body>

<!-- ============ ADMIN SHELL ============ -->
<form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display:none">@csrf</form>

<div id="adminShell" class="show">
  <div id="sidebarOverlay"></div>
  <aside class="admin-sidebar" id="sidebarNav">
    <nav class="admin-nav">
        <a href="{{ route('admin.index') }}" data-view="dashboard" class="active">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
          Dashboard
        </a>
        <a href="{{ route('admin.index', ['view' => 'projects']) }}" data-view="projects"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 17l6-6-6-6M12 19h8"/></svg>Projects<span class="count" id="cntProjects">0</span></a>
        <a href="{{ route('admin.index', ['view' => 'skills']) }}" data-view="skills"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg>Skills<span class="count" id="cntSkills">0</span></a>
        <a href="{{ route('admin.index', ['view' => 'experience']) }}" data-view="experience"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>Experience<span class="count" id="cntExperience">0</span></a>
        <a href="{{ route('admin.index', ['view' => 'testimonials']) }}" data-view="testimonials"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>Testimonials<span class="count" id="cntTestimonials">0</span></a>
        <a href="{{ route('admin.index', ['view' => 'blog']) }}" data-view="blog"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16v16H4z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>Blog<span class="count" id="cntBlog">0</span></a>
        <a href="{{ route('admin.index', ['view' => 'messages']) }}" data-view="messages"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16v16H4z"/><path d="M4 6l8 7 8-7"/></svg>Messages<span class="count" id="cntMessages">0</span></a>
        <a href="#" data-view="media"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>Media</a>
        <a href="{{ route('admin.index', ['view' => 'settings']) }}" data-view="settings"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>Settings</a>
    </nav>
  </aside>

  <div class="admin-main">
    <header class="admin-navbar" id="adminNavbar">
      <div class="nav-inner">
        <div class="nav-left">
          <button class="hamburger-admin" id="hamburgerAdmin" title="Menu"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
          <a href="{{ route('admin.index') }}" class="nav-brand"><i></i>muhammadbinimran<span>.online</span></a>
        </div>
        <div class="nav-right">
        <button class="icon-btn" id="adminThemeToggle" title="Toggle theme">
          <svg id="adminThemeIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
        </button>
        <button class="icon-btn" title="Notifications"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 01-3.4 0"/></svg><span class="dot"></span></button>
        <a href="{{ route('index') }}" class="btn btn-ghost btn-sm" id="viewSiteBtn"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><path d="M15 3h6v6"/><path d="M10 14L21 3"/></svg><span class="view-site-label">View Site</span></a>
        <div class="user-chip">
          <div class="avatar-sm">{{ mb_strtoupper(substr(auth()->user()->name ?? 'MB', 0, 1)) }}</div>
          <div class="user-meta">
            <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="user-role">Administrator</div>
          </div>
        </div>
        <button class="icon-btn" id="logoutBtn" title="Log out">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/></svg>
        </button>
        </div>
      </div>
    </header>

    <div class="main-content">
    <div class="content-area">

      <!-- DASHBOARD -->
      <section class="view active" id="view-dashboard">
        <div class="view-head"><div><h2>Welcome back, {{ auth()->user()->name ?? 'Admin' }}</h2><p>Here's what's happening with your portfolio.</p></div></div>
        <div class="kpi-grid">
          <div class="kpi-card"><div class="kpi-top"><div class="kpi-icon" style="background:var(--accent-soft);color:var(--accent);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 17l6-6-6-6M12 19h8"/></svg></div><span class="kpi-trend">+12%</span></div><div class="kpi-num" id="kpiProjects">0</div><div class="kpi-label">TOTAL PROJECTS</div></div>
          <div class="kpi-card"><div class="kpi-top"><div class="kpi-icon" style="background:var(--accent-2-soft);color:var(--accent-2);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16v16H4z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg></div><span class="kpi-trend">+3</span></div><div class="kpi-num" id="kpiBlog">0</div><div class="kpi-label">BLOG POSTS</div></div>
          <div class="kpi-card"><div class="kpi-top"><div class="kpi-icon" style="background:var(--danger-soft);color:var(--danger);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16v16H4z"/><path d="M4 6l8 7 8-7"/></svg></div><span class="kpi-trend" id="kpiUnreadTrend">0 new</span></div><div class="kpi-num" id="kpiMessages">0</div><div class="kpi-label">MESSAGES</div></div>
          <div class="kpi-card"><div class="kpi-top"><div class="kpi-icon" style="background:var(--success-soft);color:var(--success);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7z"/></svg></div><span class="kpi-trend">+18</span></div><div class="kpi-num">1.2K</div><div class="kpi-label">GITHUB STARS</div></div>
        </div>
        <div class="chart-grid">
          <div class="panel">
            <div class="panel-head"><span>portfolio_visits.chart</span><span>last 7 days</span></div>
            <div class="panel-body"><canvas id="visitsChart" height="150"></canvas></div>
          </div>
          <div class="panel">
            <div class="panel-head"><span>recent_messages.log</span><a href="#" data-view="messages" class="view-link" style="color:var(--accent-2);">View all</a></div>
            <div id="recentMessagesList"></div>
          </div>
        </div>
      </section>

      <!-- PROJECTS -->
      <section class="view" id="view-projects">
        <div class="view-head">
          <div><h2>Projects</h2><p>Manage your featured project repositories.</p></div>
          <button class="btn btn-primary" onclick="openEntityModal('projects')">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> Add Project
          </button>
        </div>
        <div class="panel"><div class="table-wrap" id="table-projects"></div></div>
      </section>

      <!-- SKILLS -->
      <section class="view" id="view-skills">
        <div class="view-head">
          <div><h2>Skills</h2><p>Manage the skills displayed on your portfolio.</p></div>
          <button class="btn btn-primary" onclick="openEntityModal('skills')"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> Add Skill</button>
        </div>
        <div class="panel"><div class="table-wrap" id="table-skills"></div></div>
      </section>

      <!-- EXPERIENCE -->
      <section class="view" id="view-experience">
        <div class="view-head">
          <div><h2>Experience</h2><p>Roles and education shown in your timeline.</p></div>
          <button class="btn btn-primary" onclick="openEntityModal('experience')"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> Add Entry</button>
        </div>
        <div class="panel"><div class="table-wrap" id="table-experience"></div></div>
      </section>

      <!-- TESTIMONIALS -->
      <section class="view" id="view-testimonials">
        <div class="view-head">
          <div><h2>Testimonials</h2><p>Client feedback shown on your homepage.</p></div>
          <button class="btn btn-primary" onclick="openEntityModal('testimonials')"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> Add Testimonial</button>
        </div>
        <div class="panel"><div class="table-wrap" id="table-testimonials"></div></div>
      </section>

      <!-- BLOG -->
      <section class="view" id="view-blog">
        <div class="view-head">
          <div><h2>Blog Posts</h2><p>Articles published on your blog.</p></div>
          <button class="btn btn-primary" onclick="openEntityModal('blog')"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> New Post</button>
        </div>
        <div class="panel"><div class="table-wrap" id="table-blog"></div></div>
      </section>

      <!-- MESSAGES -->
      <section class="view" id="view-messages">
        <div class="view-head"><div><h2>Messages</h2><p>Submissions from your contact form.</p></div></div>
        <div class="panel" id="messagesPanel"></div>
      </section>

      <!-- MEDIA -->
      <section class="view" id="view-media">
        <div class="view-head"><div><h2>Media &amp; Resume</h2><p>Upload images and your resume PDF for use across the site.</p></div></div>
        <div class="upload-zone" id="uploadZone">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" style="margin-bottom:10px;"><path d="M12 3v12m0 0l-4-4m4 4l4-4M4 19h16"/></svg>
          <div style="font-size:14px;">Click to upload, or drag files here</div>
          <div class="mono" style="font-size:11px;color:var(--text-dim);margin-top:4px;">PNG, JPG, PDF up to 10MB</div>
          <input type="file" id="fileInput" style="display:none" multiple>
        </div>
        <div class="media-grid" id="mediaGrid"></div>
      </section>

      <!-- SETTINGS -->
      <section class="view" id="view-settings">
        <div class="view-head"><div><h2>Settings</h2><p>Site-wide configuration and SEO.</p></div></div>
        <div class="settings-tabs">
          <div class="settings-tab active" data-tab="general">General</div>
          <div class="settings-tab" data-tab="seo">SEO</div>
          <div class="settings-tab" data-tab="social">Social Links</div>
        </div>
        <div class="panel"><div class="panel-body">
          <div class="settings-panel active" data-panel="general">
            <div class="form-row">
              <div class="field"><label>SITE TITLE</label><input type="text" value="Muhammad Bin Imran — Full Stack Web Developer"></div>
              <div class="field"><label>TAGLINE</label><input type="text" value="Laravel · Go · REST APIs"></div>
            </div>
            <div class="field"><label>CONTACT EMAIL</label><input type="email" value="hello@muhammadbiimran.online"></div>
            <div class="toggle-row"><span style="font-size:13.5px;">Maintenance Mode</span><label class="switch"><input type="checkbox"><span class="slider-tog"></span></label></div>
            <button class="btn btn-primary" onclick="toast('Settings saved')">Save Changes</button>
          </div>
          <div class="settings-panel" data-panel="seo">
            <div class="field"><label>META TITLE</label><input type="text" value="Muhammad Bin Imran | Laravel &amp; Go Developer"></div>
            <div class="field"><label>META DESCRIPTION</label><textarea>Full stack web developer specializing in Laravel, Go and REST APIs. Available for hire.</textarea></div>
            <div class="field"><label>OG IMAGE URL</label><input type="text" placeholder="https://muhammadbiimran.online/og-cover.png"></div>
            <button class="btn btn-primary" onclick="toast('SEO settings saved')">Save Changes</button>
          </div>
          <div class="settings-panel" data-panel="social">
            <div class="form-row">
              <div class="field"><label>GITHUB URL</label><input type="text" value="https://github.com/muhammadbinimran"></div>
              <div class="field"><label>LINKEDIN URL</label><input type="text" value="https://linkedin.com/in/muhammadbinimran"></div>
            </div>
            <div class="field"><label>TWITTER / X URL</label><input type="text" placeholder="https://x.com/yourhandle"></div>
            <button class="btn btn-primary" onclick="toast('Social links saved')">Save Changes</button>
          </div>
        </div></div>
      </section>

      </div>
    </div>
  </div>
</div>

<!-- ============ MODAL ============ -->
<div id="modalOverlay">
  <div class="modal">
    <div class="modal-head"><h3 id="modalTitle">Add Item</h3><button class="modal-close" onclick="closeModal()"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18M6 6l12 12"/></svg></button></div>
    <form id="modalForm"></form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script>
/* ---------- TOAST ---------- */
function toast(msg, type){
  Toastify({
    text: msg, duration: 2500, gravity: 'top', position: 'right',
    style:{ background: type==='error' ? '#FF6B6B' : '#131826', color:'#E9ECF1', border:'1px solid rgba(255,255,255,.12)' }
  }).showToast();
}

/* ---------- THEME ---------- */
const root = document.documentElement;
function setTheme(t){
  root.setAttribute('data-theme', t);
  const icon = document.getElementById('adminThemeIcon');
  if(icon) icon.innerHTML = t === 'light'
    ? '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>'
    : '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>';
}
setTheme('dark');
const themeToggleBtn = document.getElementById('adminThemeToggle');
if(themeToggleBtn) themeToggleBtn.addEventListener('click', ()=> setTheme(root.getAttribute('data-theme')==='light'?'dark':'light'));

/* ---------- LOGIN ---------- */
const logoutBtn = document.getElementById('logoutBtn');
if (logoutBtn) {
  logoutBtn.addEventListener('click', ()=>{
    const f = document.getElementById('logoutForm');
    if (f) f.submit();
    else console.warn('logout form not found');
  });
}

/* ---------- NAVBAR / MOBILE MENU ---------- */
const adminNav = document.getElementById('sidebarNav');
const sidebarOverlay = document.getElementById('sidebarOverlay');
// bind all hamburger buttons (some templates may include duplicates)
(document.querySelectorAll('#hamburgerAdmin') || []).forEach(btn => {
  if (!btn) return;
  btn.addEventListener('click', () => { if(adminNav) adminNav.classList.add('open'); if(sidebarOverlay) sidebarOverlay.classList.add('show'); });
});
if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
function closeSidebar(){ if(adminNav) adminNav.classList.remove('open'); if(sidebarOverlay) sidebarOverlay.classList.remove('show'); }

document.querySelectorAll('[data-view]').forEach(link=>{
  link.addEventListener('click', e=>{
    e.preventDefault();
    const v = link.dataset.view;
    document.querySelectorAll('.admin-nav a').forEach(a=>a.classList.toggle('active', a.dataset.view===v));
    document.querySelectorAll('.view').forEach(sec=>sec.classList.toggle('active', sec.id==='view-'+v));
    document.title = (link.textContent.trim().replace(/\d+$/,'').trim() || 'Admin') + ' — MBI Admin';
    // update URL without reloading so direct links work and history is preserved
    if (link.href && link.href.indexOf('/admin')===0) {
      history.pushState({}, '', link.href);
    }
    closeSidebar();
  });
});

// initialize active view from server-provided variable or URL
const initialAdminView = (typeof ADMIN_VIEW !== 'undefined') ? ADMIN_VIEW : '{{ $adminView ?? 'dashboard' }}';
if(initialAdminView){
  const desired = initialAdminView === '' ? 'dashboard' : initialAdminView;
  const link = document.querySelector(`.admin-nav a[data-view="${desired}"]`);
  if(link) link.click();
  else {
    document.querySelectorAll('.view').forEach(sec=>sec.classList.toggle('active', sec.id==='view-'+desired));
  }
}

// handle back/forward navigation
window.addEventListener('popstate', ()=>{
  const seg = window.location.pathname.split('/').filter(Boolean).pop();
  const view = seg && seg !== 'admin' ? seg : 'dashboard';
  const link = document.querySelector(`.admin-nav a[data-view="${view}"]`);
  if(link) link.click();
});

/* ---------- SETTINGS TABS ---------- */
document.querySelectorAll('.settings-tab').forEach(tab=>{
  tab.addEventListener('click', ()=>{
    document.querySelectorAll('.settings-tab').forEach(t=>t.classList.remove('active'));
    tab.classList.add('active');
    document.querySelectorAll('.settings-panel').forEach(p=>p.classList.toggle('active', p.dataset.panel===tab.dataset.tab));
  });
});

/* ---------- DATA STORE (in-memory demo data) ---------- */
let DB = {
  projects: [
    {id:1,title:'Invoicely',category:'Laravel',tech:'Laravel, Livewire, MySQL',github:'https://github.com/muhammadbinimran/invoicely',demo:'https://invoicely.demo',featured:true,status:'Published'},
    {id:2,title:'Fleetpulse',category:'Go',tech:'Golang, WebSockets, Redis',github:'https://github.com/muhammadbinimran/fleetpulse',demo:'https://fleetpulse.demo',featured:true,status:'Published'},
    {id:3,title:'Kanbly',category:'JavaScript',tech:'JavaScript, IndexedDB',github:'https://github.com/muhammadbinimran/kanbly',demo:'',featured:false,status:'Draft'},
  ],
  skills: [
    {id:1,name:'Laravel',group:'Primary',pct:95},
    {id:2,name:'Golang',group:'Primary',pct:85},
    {id:3,name:'JavaScript',group:'Primary',pct:88},
    {id:4,name:'Docker',group:'Secondary',pct:78},
  ],
  experience: [
    {id:1,role:'Senior Full Stack Developer',company:'Freelance / Contract',duration:'2023 — Present'},
    {id:2,role:'Full Stack Web Developer',company:'Software Agency',duration:'2021 — 2023'},
  ],
  testimonials: [
    {id:1,name:'Sarah Khan',company:'Nimbus Retail',rating:5,text:'Muhammad delivered exactly what we needed, on time and well documented.'},
    {id:2,name:'David Chen',company:'Fleetwise Logistics',rating:5,text:'The Go service he built handles our load without breaking a sweat.'},
  ],
  blog: [
    {id:1,title:'Structuring Laravel apps for teams that outgrow the defaults',category:'Laravel',status:'Published',date:'2026-07-12'},
    {id:2,title:'Handling 10k concurrent connections without losing your mind',category:'Go',status:'Published',date:'2026-06-28'},
    {id:3,title:"A deployment pipeline that doesn't wake you up at 2am",category:'DevOps',status:'Draft',date:'2026-06-10'},
  ],
  messages: [
    {id:1,name:'Ayesha Raza',email:'ayesha@studio.io',message:'Hi Muhammad, we need a Laravel backend for our booking platform. Can we schedule a call this week?',date:'Jul 18, 2026',read:false},
    {id:2,name:'Tom Becker',email:'tom@fleetwise.com',message:'Loved the Fleetpulse case study — do you take on Go microservice contracts?',date:'Jul 15, 2026',read:false},
    {id:3,name:'Priya Nair',email:'priya@nimbus.co',message:'Following up on the invoice generator project, everything looks great so far.',date:'Jul 10, 2026',read:true},
  ],
};
let idCounter = 1000;

const CSRF = document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').getAttribute('content') : '';

async function fetchEntityFromServer(entity){
  try{
    const res = await fetch(`/admin/api/${entity}`);
    if(!res.ok) return null;
    const data = await res.json();
    return Array.isArray(data) ? data : null;
  }catch(e){ return null; }
}

async function saveEntityToServer(entity, record){
  try{
    const method = record.id !== undefined ? 'PUT' : 'POST';
    const url = record && record.id ? `/admin/api/${entity}/${record.id}` : `/admin/api/${entity}`;
    const res = await fetch(url, {method, headers: {'Content-Type':'application/json','X-CSRF-TOKEN':CSRF}, body: JSON.stringify(record)});
    if(!res.ok) throw new Error('server error');
    return await res.json();
  }catch(e){ console.error(e); return null; }
}

async function deleteEntityOnServer(entity, id){
  try{
    const res = await fetch(`/admin/api/${entity}/${id}`, {method:'DELETE', headers:{'X-CSRF-TOKEN':CSRF}});
    return res.ok;
  }catch(e){ return false; }
}

/* ---------- ENTITY CONFIG (drives table + modal form) ---------- */
const CONFIG = {
  projects: {
    label:'Project',
    columns:[
      {key:'image',header:'Preview',render:r=>`${r.image?`<img class="thumb-sm" src="${r.image}" onerror="this.style.display='none'">`:'<span class="badge">No img</span>'}`},
      {key:'title',header:'Project',render:r=>`<div class="cell-title">${r.title}</div><div class="cell-sub">${r.tech||''}</div>`},
      {key:'category',header:'Category',render:r=>`<span class="badge">${r.category}</span>`},
      {key:'featured',header:'Featured',render:r=>r.featured?'<span class="status-pill status-featured">Featured</span>':'<span class="status-pill status-draft">No</span>'},
      {key:'status',header:'Status',render:r=>`<span class="status-pill status-${r.status.toLowerCase()}">${r.status}</span>`},
    ],
    fields:[
      {key:'title',label:'Title',type:'text',required:true},
      {key:'category',label:'Category',type:'select',options:['Laravel','Go','JavaScript','Full Stack']},
      {key:'image',label:'Featured Image',type:'upload',accept:'image/*'},
      {key:'video',label:'Video (YouTube/Vimeo URL or upload MP4)',type:'upload',accept:'video/*'},
      {key:'description',label:'Description',type:'textarea'},
      {key:'tech',label:'Tech Badges (comma separated)',type:'text'},
      {key:'github',label:'GitHub URL',type:'text'},
      {key:'demo',label:'Live Demo URL',type:'text'},
      {key:'stars',label:'GitHub Stars',type:'number'},
      {key:'forks',label:'GitHub Forks',type:'number'},
      {key:'status',label:'Status',type:'select',options:['Published','Draft']},
      {key:'featured',label:'Featured on homepage',type:'toggle'},
    ]
  },
  skills: {
    label:'Skill',
    columns:[
      {key:'name',header:'Skill',render:r=>`<div class="cell-title">${r.name}</div>`},
      {key:'group',header:'Group',render:r=>`<span class="badge">${r.group}</span>`},
      {key:'pct',header:'Proficiency',render:r=>`<span class="mono" style="color:var(--accent-2);">${r.pct}%</span>`},
    ],
    fields:[
      {key:'name',label:'Skill Name',type:'text',required:true},
      {key:'group',label:'Group',type:'select',options:['Primary','Secondary']},
      {key:'pct',label:'Proficiency (%)',type:'range'},
    ]
  },
  experience: {
    label:'Entry',
    columns:[
      {key:'role',header:'Role',render:r=>`<div class="cell-title">${r.role}</div><div class="cell-sub">${r.company}</div>`},
      {key:'duration',header:'Duration',render:r=>`<span class="mono">${r.duration}</span>`},
    ],
    fields:[
      {key:'role',label:'Role / Title',type:'text',required:true},
      {key:'company',label:'Company / School',type:'text'},
      {key:'duration',label:'Duration (e.g. 2023 — Present)',type:'text'},
    ]
  },
  testimonials: {
    label:'Testimonial',
    columns:[
      {key:'name',header:'Client',render:r=>`<div class="cell-title">${r.name}</div><div class="cell-sub">${r.company}</div>`},
      {key:'rating',header:'Rating',render:r=>`<span class="stars">${'★'.repeat(r.rating)}${'☆'.repeat(5-r.rating)}</span>`},
      {key:'text',header:'Quote',render:r=>`<div style="max-width:280px;color:var(--text-muted);font-size:12.5px;">${r.text.slice(0,70)}${r.text.length>70?'…':''}</div>`},
    ],
    fields:[
      {key:'name',label:'Client Name',type:'text',required:true},
      {key:'company',label:'Company',type:'text'},
      {key:'rating',label:'Rating (1-5)',type:'select',options:['5','4','3','2','1']},
      {key:'text',label:'Testimonial Text',type:'textarea'},
    ]
  },
  blog: {
    label:'Post',
    columns:[
      {key:'image',header:'Cover',render:r=>`${r.image?`<img class="thumb-sm" src="${r.image}" onerror="this.style.display='none'">`:'<span class="badge">No img</span>'}`},
      {key:'title',header:'Title',render:r=>`<div class="cell-title">${r.title}</div>`},
      {key:'category',header:'Category',render:r=>`<span class="badge">${r.category}</span>`},
      {key:'status',header:'Status',render:r=>`<span class="status-pill status-${r.status.toLowerCase()}">${r.status}</span>`},
      {key:'date',header:'Date',render:r=>`<span class="mono">${r.date}</span>`},
    ],
    fields:[
      {key:'title',label:'Post Title',type:'text',required:true},
      {key:'category',label:'Category',type:'select',options:['Laravel','Go','DevOps','JavaScript']},
      {key:'image',label:'Cover Image',type:'upload',accept:'image/*'},
      {key:'excerpt',label:'Excerpt',type:'textarea'},
      {key:'content',label:'Content (HTML / Markdown)',type:'textarea'},
      {key:'status',label:'Status',type:'select',options:['Published','Draft']},
      {key:'date',label:'Publish Date',type:'date'},
      {key:'read_time',label:'Read Time (minutes)',type:'number'},
      {key:'url',label:'External URL',type:'text'},
    ]
  },
};

let editingEntity = null, editingId = null;

function renderTable(entity){
  const cfg = CONFIG[entity];
  const rows = DB[entity];
  const container = document.getElementById('table-'+entity);
  if(!rows.length){
    container.innerHTML = `<div class="empty-state">
      <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16v16H4z"/></svg>
      <div>No ${cfg.label.toLowerCase()}s yet. Click "Add" to create one.</div>
    </div>`;
    return;
  }
  let html = '<table><thead><tr>';
  cfg.columns.forEach(c=> html += `<th>${c.header}</th>`);
  html += '<th style="text-align:right;">Actions</th></tr></thead><tbody>';
  rows.forEach(r=>{
    html += '<tr>';
    cfg.columns.forEach(c=> html += `<td>${c.render(r)}</td>`);
    html += `<td><div class="row-actions">
      <button class="btn btn-ghost btn-icon" title="Edit" onclick="openEntityModal('${entity}', ${r.id})"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z"/></svg></button>
      <button class="btn btn-danger btn-icon" title="Delete" onclick="deleteEntity('${entity}', ${r.id})"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
    </div></td></tr>`;
  });
  html += '</tbody></table>';
  container.innerHTML = html;
  updateCounts();
}

function updateCounts(){
  ['projects','skills','experience','testimonials','blog','messages'].forEach(e=>{
    const el = document.getElementById('cnt'+e.charAt(0).toUpperCase()+e.slice(1));
    if(el) el.textContent = DB[e].length;
  });
  document.getElementById('kpiProjects').textContent = DB.projects.length;
  document.getElementById('kpiBlog').textContent = DB.blog.length;
  document.getElementById('kpiMessages').textContent = DB.messages.length;
  const unread = DB.messages.filter(m=>!m.read).length;
  document.getElementById('kpiUnreadTrend').textContent = unread + ' new';
}

function mediaPreviewHtml(val){
  if(!val) return '<span class="no-media">No file yet</span>';
  if(/\.(png|jpe?g|gif|webp|svg|avif|bmp)(\?|$)/i.test(val)) return `<img src="${val}" alt="" onerror="this.parentElement.innerHTML='<span class=no-media>Broken URL</span>'">`;
  if(/\.(mp4|webm|ogg|mov|m4v)(\?|$)/i.test(val)) return `<video src="${val}" controls muted></video>`;
  return `<span class="thumb-link"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 007.5.5l3-3a5 5 0 00-7-7l-1.7 1.7"/><path d="M14 11a5 5 0 00-7.5-.5l-3 3a5 5 0 007 7l1.7-1.7"/></svg>${val}</span>`;
}

function openEntityModal(entity, id){
  editingEntity = entity; editingId = id || null;
  const cfg = CONFIG[entity];
  if(!cfg) { toast('Entity not found', 'error'); return; }
  const record = id ? DB[entity].find(r=>r.id===id) : {};
  const mt = document.getElementById('modalTitle');
  if(mt) mt.textContent = (id ? 'Edit ' : 'Add ') + cfg.label;
  let formHtml = '';
  cfg.fields.forEach(f=>{
    const val = record[f.key] !== undefined ? record[f.key] : '';
    if(f.type==='select'){
      formHtml += `<div class="field"><label>${f.label.toUpperCase()}</label><select data-key="${f.key}">`;
      f.options.forEach(o=> formHtml += `<option value="${o}" ${String(val)===o?'selected':''}>${o}</option>`);
      formHtml += `</select></div>`;
    } else if(f.type==='textarea'){
      formHtml += `<div class="field"><label>${f.label.toUpperCase()}</label><textarea data-key="${f.key}">${val}</textarea></div>`;
    } else if(f.type==='toggle'){
      formHtml += `<div class="toggle-row"><span style="font-size:13.5px;">${f.label}</span><label class="switch"><input type="checkbox" data-key="${f.key}" ${val?'checked':''}><span class="slider-tog"></span></label></div>`;
    } else if(f.type==='range'){
      formHtml += `<div class="field"><label>${f.label.toUpperCase()}</label><div class="range-row"><input type="range" min="0" max="100" data-key="${f.key}" value="${val||70}" oninput="this.nextElementSibling.textContent=this.value+'%'"><span class="range-val">${val||70}%</span></div></div>`;
    } else if(f.type==='upload'){
      formHtml += `<div class="field"><label>${f.label.toUpperCase()}</label>
        <div class="upload-wrap">
          <div class="upload-row">
            <input type="text" class="upload-url" data-key="${f.key}" value="${val}" placeholder="Paste URL or upload a file">
            <button type="button" class="btn btn-ghost btn-sm upload-pick" style="flex-shrink:0;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 3v12m0 0l-4-4m4 4l4-4M4 19h16"/></svg> Upload</button>
            <input type="file" class="upload-input" data-key="${f.key}" accept="${f.accept||'image/*'}" style="display:none">
          </div>
          <div class="upload-preview">${mediaPreviewHtml(val)}</div>
        </div></div>`;
    } else {
      formHtml += `<div class="field"><label>${f.label.toUpperCase()}</label><input type="${f.type}" data-key="${f.key}" value="${val}" ${f.required?'required':''}></div>`;
    }
  });
  formHtml += `<div style="display:flex;gap:10px;margin-top:6px;">
    <button type="submit" class="btn btn-primary" style="flex:1;justify-content:center;">Save ${cfg.label}</button>
    <button type="button" class="btn btn-ghost" onclick="closeModal()">Cancel</button>
  </div>`;
  const mf = document.getElementById('modalForm');
  const mo = document.getElementById('modalOverlay');
  if(mf) mf.innerHTML = formHtml;
  if(mo) mo.classList.add('show');

  // wire up upload buttons -> hidden file inputs -> /admin/api/media
  mf.querySelectorAll('.upload-pick').forEach(btn=>{
    const inp = btn.parentElement.querySelector('.upload-input');
    btn.addEventListener('click', ()=> inp.click());
    inp.addEventListener('change', async ()=>{
      const file = inp.files[0];
      if(!file) return;
      const fd = new FormData();
      fd.append('file[]', file);
      const orig = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = 'Uploading…';
      try{
        const res = await fetch('/admin/api/media', {method:'POST', headers:{'X-CSRF-TOKEN':CSRF}, body: fd});
        if(!res.ok) throw new Error('upload failed');
        const arr = await res.json();
        const u = Array.isArray(arr) ? arr[0] : arr;
        const urlEl = mf.querySelector(`.upload-url[data-key="${inp.dataset.key}"]`);
        const prevEl = btn.parentElement.parentElement.querySelector('.upload-preview');
        if(urlEl) urlEl.value = u.url;
        if(prevEl) prevEl.innerHTML = mediaPreviewHtml(u.url);
        toast('File uploaded');
      }catch(err){ console.error(err); toast('Upload failed', 'error'); }
      btn.disabled = false;
      btn.innerHTML = orig;
    });
  });
}
function closeModal(){ const mo = document.getElementById('modalOverlay'); if(mo) mo.classList.remove('show'); }
const modalOverlay = document.getElementById('modalOverlay');
if(modalOverlay) modalOverlay.addEventListener('click', e=>{ if(e.target.id==='modalOverlay') closeModal(); });

const modalForm = document.getElementById('modalForm');
if(modalForm) modalForm.addEventListener('submit', async e=>{
  e.preventDefault();
  const cfg = CONFIG[editingEntity];
  const record = editingId ? {...DB[editingEntity].find(r=>r.id===editingId)} : {};
  cfg.fields.forEach(f=>{
    const el = e.target.querySelector(`[data-key="${f.key}"]`);
    if(!el) return;
    if(f.type==='toggle') record[f.key] = el.checked;
    else if(f.type==='range') record[f.key] = parseInt(el.value);
    else record[f.key] = el.value;
  });
  const saved = await saveEntityToServer(editingEntity, record);
  if(saved){
    if(editingId){
      const idx = DB[editingEntity].findIndex(r=>r.id===editingId);
      if(idx>-1) DB[editingEntity][idx] = saved;
    } else {
      DB[editingEntity].push(saved);
    }
    renderTable(editingEntity);
    closeModal();
    toast(`${cfg.label} ${editingId ? 'updated' : 'created'}`);
  } else {
    toast('Failed to save to server', 'error');
  }
});

async function deleteEntity(entity, id){
  if(!confirm('Delete this item? This cannot be undone.')) return;
  const ok = await deleteEntityOnServer(entity, id);
  if(ok){
    DB[entity] = DB[entity].filter(r=>r.id!==id);
    renderTable(entity);
    if(entity==='messages') renderMessages();
    toast('Item deleted', 'error');
  } else {
    toast('Failed to delete on server', 'error');
  }
}

/* ---------- MESSAGES ---------- */
function renderMessages(){
  const panel = document.getElementById('messagesPanel');
  if(!DB.messages.length){ panel.innerHTML = '<div class="empty-state">No messages yet.</div>'; return; }
  panel.innerHTML = DB.messages.map(m=>`
    <div class="msg-item" onclick="markRead(${m.id})">
      <div class="msg-avatar">${m.name.split(' ').map(w=>w[0]).join('').slice(0,2)}</div>
      <div class="msg-body">
        <div class="msg-top"><span class="msg-name">${m.name} ${!m.read?'<span class=\"status-pill status-unread\" style=\"margin-left:6px;\">New</span>':''}</span><span class="msg-date">${m.date}</span></div>
        <div class="msg-email">${m.email}</div>
        <div class="msg-preview">${m.message}</div>
      </div>
      <button class="btn btn-danger btn-icon" style="align-self:center;" onclick="event.stopPropagation();deleteEntity('messages', ${m.id})"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
    </div>`).join('');
  const recent = document.getElementById('recentMessagesList');
  if(recent) recent.innerHTML = DB.messages.slice(0,3).map(m=>`
    <div class="msg-item" style="padding:14px 20px;">
      <div class="msg-avatar">${m.name.split(' ').map(w=>w[0]).join('').slice(0,2)}</div>
      <div class="msg-body"><div class="msg-top"><span class="msg-name" style="font-size:13px;">${m.name}</span><span class="msg-date">${m.date}</span></div><div class="msg-preview">${m.message}</div></div>
    </div>`).join('');
}
function markRead(id){ const m = DB.messages.find(x=>x.id===id); if(m){ m.read = true; renderMessages(); updateCounts(); } }

/* ---------- MEDIA (demo, in-memory) ---------- */
let mediaFiles = [
  {name:'resume.pdf', size:'214 KB', type:'pdf'},
  {name:'project-invoicely.png', size:'340 KB', type:'img'},
];
function renderMedia(){
  document.getElementById('mediaGrid').innerHTML = mediaFiles.map(f=>`
    <div class="media-item">
      <div class="media-thumb">${f.type==='pdf' ? '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 4h16v16H4z"/><path d="M8 12h8M8 16h5"/></svg>' : '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>'}</div>
      <div class="media-info"><div class="media-name">${f.name}</div><div class="media-size">${f.size}</div></div>
      ${f.url?`<div style="padding:10px;display:flex;gap:8px;justify-content:flex-end;"><a href="${f.url}" target="_blank" class="btn btn-ghost btn-sm">View</a><button class="btn btn-danger btn-sm" onclick="deleteMedia('${encodeURIComponent(f.name)}')">Delete</button></div>`:''}
    </div>`).join('');
}

async function deleteMedia(name){
  if(!confirm('Delete this file?')) return;
  try{
    const decoded = decodeURIComponent(name);
    const res = await fetch(`/admin/api/media/${decoded}`, {method:'DELETE', headers:{'X-CSRF-TOKEN':CSRF}});
    if(!res.ok){ toast('Failed to delete','error'); return; }
    mediaFiles = mediaFiles.filter(m=>m.name!==decoded);
    renderMedia();
    toast('File deleted','error');
  }catch(e){ console.error(e); toast('Failed to delete','error'); }
}
const uploadZone = document.getElementById('uploadZone');
const fileInput = document.getElementById('fileInput');
if(uploadZone) uploadZone.addEventListener('click', ()=> { if(fileInput) fileInput.click(); });
if(fileInput) fileInput.addEventListener('change', async e=>{
  const files = Array.from(e.target.files);
  if(!files.length) return;
  const fd = new FormData();
  files.forEach(f=> fd.append('file[]', f));
  try{
    const res = await fetch('/admin/api/media', {method:'POST', headers:{'X-CSRF-TOKEN':CSRF}, body: fd});
    if(!res.ok){ toast('Upload failed','error'); return; }
    const uploaded = await res.json();
    // API returns array of uploaded file objects
    uploaded.forEach(u=> mediaFiles.push({name:u.name,size:Math.round(u.size/1024)+' KB',type:u.name.endsWith('.pdf')?'pdf':'img', url:u.url}));
    renderMedia();
    toast('File(s) uploaded');
  }catch(err){ console.error(err); toast('Upload failed','error'); }
});

/* ---------- CHART ---------- */
function initChart(){
  const ctx = document.getElementById('visitsChart');
  new Chart(ctx, {
    type:'line',
    data:{ labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
      datasets:[{ label:'Visits', data:[120,145,132,168,190,175,210], borderColor:'#FF8A4C', backgroundColor:'rgba(255,138,76,.12)', tension:.4, fill:true, pointRadius:0, borderWidth:2 }]},
    options:{ plugins:{legend:{display:false}}, scales:{ x:{grid:{display:false},ticks:{color:'#8B93A6',font:{family:'JetBrains Mono',size:10}}}, y:{grid:{color:'rgba(255,255,255,.06)'},ticks:{color:'#8B93A6',font:{family:'JetBrains Mono',size:10}}} } }
  });
}

/* ---------- INIT ---------- */
async function initDashboard(){
  // attempt to load server data for each entity; fall back to in-memory demo data
  await Promise.all(['projects','skills','experience','testimonials','blog','messages','media'].map(async e=>{
    const data = await fetchEntityFromServer(e);
    if(Array.isArray(data)) {
      if(e === 'media') {
        mediaFiles = data.map(d=>({name:d.name,size:Math.round(d.size/1024)+' KB',type:d.name.endsWith('.pdf')?'pdf':'img', url:d.url}));
      } else {
        DB[e] = data;
      }
    }
  }));
  ['projects','skills','experience','testimonials','blog'].forEach(renderTable);
  renderMessages();
  renderMedia();
  updateCounts();
  initChart();
}

// Auto-initialize when admin shell is visible (session-based)
if(document.getElementById('adminShell').classList.contains('show')) initDashboard();
</script>
</body>
</html>