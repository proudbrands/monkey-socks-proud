<?php
/*
Template Name: Components
*/
get_header();

$theme_uri = get_template_directory_uri();
?>

<!-- ========== COMPONENTS PAGE HEADER ========== -->
<div class="cpg__header">
	<div class="container">
		<h1 class="cpg__title">Component Library</h1>
		<p class="cpg__subtitle">Toggle light/dark mode to preview every component. Approve here, push to production.</p>
	</div>
</div>

<div class="cpg">
<div class="cpg__layout">

<!-- ========== SIDEBAR NAV ========== -->
<nav class="cpg__nav">

	<!-- Theme Toggle -->
	<div class="cpg__toggle-wrap">
		<button type="button" class="pb-theme-toggle" aria-label="Toggle light/dark mode" title="Toggle light/dark mode">
			<svg class="pb-theme-toggle__sun" viewBox="0 0 24 24" fill="none">
				<circle cx="12" cy="12" r="5"/>
				<line x1="12" y1="1" x2="12" y2="3"/>
				<line x1="12" y1="21" x2="12" y2="23"/>
				<line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
				<line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
				<line x1="1" y1="12" x2="3" y2="12"/>
				<line x1="21" y1="12" x2="23" y2="12"/>
				<line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
				<line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
			</svg>
			<svg class="pb-theme-toggle__moon" viewBox="0 0 24 24" fill="none">
				<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
			</svg>
		</button>
		<div class="cpg__toggle-label">
			Toggle Theme
			<span class="cpg__toggle-hint">Preview all components</span>
		</div>
	</div>

	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Foundations</h4>
		<ul class="cpg__nav-list">
			<li><a href="#colors">Color Tokens</a></li>
			<li><a href="#typography">Typography</a></li>
			<li><a href="#buttons">Buttons</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Cards</h4>
		<ul class="cpg__nav-list">
			<li><a href="#cs-card">Case Study Card</a></li>
			<li><a href="#article-card">Blog Article Card</a></li>
			<li><a href="#resource-card">Resource Card</a></li>
			<li><a href="#help-box">Help / Service Box</a></li>
			<li><a href="#sv-pillar">Service Pillar Card</a></li>
			<li><a href="#team-card">Team Card</a></li>
			<li><a href="#believing-box">Believing Box</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Heroes</h4>
		<ul class="cpg__nav-list">
			<li><a href="#hero-service">Service Banner</a></li>
			<li><a href="#hero-sv">SV Hero</a></li>
			<li><a href="#hero-cs">Case Study Hero</a></li>
			<li><a href="#hero-blog">Blog Detail Hero</a></li>
			<li><a href="#hero-about">About Hero</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Sections</h4>
		<ul class="cpg__nav-list">
			<li><a href="#build-steps">Build Steps</a></li>
			<li><a href="#digital-partner">Digital Partner Grid</a></li>
			<li><a href="#stats-counter">Stats Counter</a></li>
			<li><a href="#snapshot">Snapshot Bar</a></li>
			<li><a href="#testimonial">Testimonial</a></li>
			<li><a href="#faq">FAQ Accordion</a></li>
			<li><a href="#expert">Expert Section</a></li>
			<li><a href="#homepage-pillars">Homepage Pillars</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Always Dark</h4>
		<ul class="cpg__nav-list">
			<li><a href="#footer-cta">Footer CTA</a></li>
			<li><a href="#footer">Footer</a></li>
			<li><a href="#marquee">Marquee / Logos</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Light Versions</h4>
		<ul class="cpg__nav-list">
			<li><a href="#light-header">Header</a></li>
			<li><a href="#light-footer-cta">Footer CTA</a></li>
			<li><a href="#light-footer">Footer</a></li>
			<li><a href="#light-marquee">Marquee / Logos</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Forms</h4>
		<ul class="cpg__nav-list">
			<li><a href="#form-inputs">Form Inputs</a></li>
		</ul>
	</div>
	<div class="cpg__nav-group">
		<h4 class="cpg__nav-title">Mockups</h4>
		<ul class="cpg__nav-list">
			<li><a href="#mockup-hero-cards">Hero + Cards</a></li>
			<li><a href="#mockup-accent-rows">Accent Rows</a></li>
			<li><a href="#mockup-brand-overlay">Brand Overlay</a></li>
		</ul>
	</div>
</nav>

<!-- ========== MAIN CONTENT ========== -->
<main class="cpg__main">


<!-- ═══════════════════════════════════════════
     FOUNDATIONS
     ═══════════════════════════════════════════ -->

<!-- ── Color Tokens ── -->
<section id="colors" class="cpg__section">
	<h2 class="cpg__section-title">Color Tokens</h2>
	<p class="cpg__section-desc">CSS custom properties that drive the entire theme. Toggle above to see values switch live.</p>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Backgrounds</h3>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="cpg__swatches">
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-bg-primary);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-bg-primary</span><span class="cpg__swatch-value">Dark: #000 / Light: #fff</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-bg-secondary);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-bg-secondary</span><span class="cpg__swatch-value">Dark: #151515 / Light: #f5f5f7</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-bg-surface);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-bg-surface</span><span class="cpg__swatch-value">Dark: #0A0A0A / Light: #f0f0f2</span></div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Text</h3>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="cpg__swatches">
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-text-primary);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-text-primary</span><span class="cpg__swatch-value">Dark: #fff / Light: #1a1a1a</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-text-secondary);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-text-secondary</span><span class="cpg__swatch-value">Dark: #b0b0b0 / Light: #555</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-text-muted);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-text-muted</span><span class="cpg__swatch-value">Dark: #767676 / Light: #888</span></div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Brand Accents (same in both modes)</h3>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="cpg__swatches">
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#2AB473;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Green</span><span class="cpg__swatch-value">#2AB473</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#8BC53F;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Lime</span><span class="cpg__swatch-value">#8BC53F</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#F8B042;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Orange</span><span class="cpg__swatch-value">#F8B042</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#F06522;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Red Orange</span><span class="cpg__swatch-value">#F06522</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#44C6EF;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Cyan</span><span class="cpg__swatch-value">#44C6EF</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#A89677;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Gold</span><span class="cpg__swatch-value">#A89677</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:#FFFF00;"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Yellow</span><span class="cpg__swatch-value">#FFFF00 — dark only</span></div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Borders</h3>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="cpg__swatches">
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:var(--pb-border);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">--pb-border</span><span class="cpg__swatch-value">Dark: #373737 / Light: #e0e0e0</span></div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Muted Brand Accent Backgrounds</h3>
		<p class="cpg__component-meta">Used for pills, icon backgrounds, subtle tints on cards</p>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="cpg__swatches">
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:rgba(42,180,115,0.1);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Green 10%</span><span class="cpg__swatch-value">rgba(42,180,115,0.1)</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:rgba(140,198,63,0.1);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Lime 10%</span><span class="cpg__swatch-value">rgba(140,198,63,0.1)</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:rgba(248,176,66,0.1);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Orange 10%</span><span class="cpg__swatch-value">rgba(248,176,66,0.1)</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:rgba(240,101,34,0.1);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Red-Orange 10%</span><span class="cpg__swatch-value">rgba(240,101,34,0.1)</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:rgba(68,198,239,0.1);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Cyan 10%</span><span class="cpg__swatch-value">rgba(68,198,239,0.1)</span></div></div>
					<div class="cpg__swatch"><div class="cpg__swatch-color" style="background:rgba(168,150,119,0.1);"></div><div class="cpg__swatch-info"><span class="cpg__swatch-name">Gold 10%</span><span class="cpg__swatch-value">rgba(168,150,119,0.1)</span></div></div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ── Typography ── -->
<section id="typography" class="cpg__section">
	<h2 class="cpg__section-title">Typography</h2>
	<p class="cpg__section-desc">Overpass font, weights 300–700. Toggle theme to verify contrast in both modes.</p>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Headings</h3>
		<div class="cpg__component-meta"><code>font-family: var(--overpass)</code></div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<h1 style="font-size:45px; font-weight:700; margin-bottom:16px; line-height:1.1;">Heading One</h1>
				<h2 style="font-size:36px; font-weight:700; margin-bottom:14px; line-height:1.1;">Heading Two</h2>
				<h3 style="font-size:26px; font-weight:700; margin-bottom:12px; line-height:1.2;">Heading Three</h3>
				<h4 style="font-size:20px; font-weight:600; margin-bottom:10px; line-height:1.3;">Heading Four</h4>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Body Text & Muted</h3>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<p style="font-size:18px; font-weight:300; margin-bottom:12px; line-height:1.6;">Body text at 18px weight 300. This is the standard paragraph style used across most sections of the site.</p>
				<p style="font-size:16px; color:var(--pb-text-secondary); margin-bottom:12px; line-height:1.6;">Secondary text — used for descriptions and supporting copy.</p>
				<p style="font-size:14px; color:var(--pb-text-muted); line-height:1.5;">Muted text — captions, labels, timestamps, and metadata.</p>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Gradient Text</h3>
		<div class="cpg__component-meta"><code>.typing-effect</code> · <code>background-clip: text</code></div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<h2 style="font-size:45px; font-weight:700; line-height:1.1; color:var(--pb-text-primary);">We build brands that <strong class="typing-effect">stand out</strong></h2>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Caption / Label</h3>
		<div class="cpg__component-meta"><code>text-transform: uppercase; letter-spacing: 2.4px</code></div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<span style="text-transform:uppercase; font-size:20px; color:var(--pb-text-muted); letter-spacing:2.4px; display:block;">Section Caption</span>
			</div>
		</div>
	</div>
</section>


<!-- ── Buttons ── -->
<section id="buttons" class="cpg__section">
	<h2 class="cpg__section-title">Buttons</h2>
	<p class="cpg__section-desc">Primary, secondary, and CTA button styles. Watch how they adapt on toggle.</p>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Primary Button</h3>
		<div class="cpg__component-meta"><code>.primary_btn</code></div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<a href="#" class="primary_btn" onclick="return false;">Get Started</a>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Secondary Button</h3>
		<div class="cpg__component-meta"><code>.secondary_btn</code></div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<a href="#" class="secondary_btn" onclick="return false;">Learn More</a>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Case Study CTA Button</h3>
		<div class="cpg__component-meta"><code>.cs-cta__btn--primary</code></div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<a href="#" class="cs-cta__btn cs-cta__btn--primary" onclick="return false;">View Case Study</a>
			</div>
		</div>
	</div>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Footer CTA Buttons <span class="cpg__component-status cpg__component-status--dark-only">Always Dark</span></h3>
		<div class="cpg__component-meta"><code>.pb-footer-cta__btn</code></div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="background:#0A0A0A;">
				<div class="pb-footer-cta" style="padding:0; background:transparent;">
					<div style="display:flex; gap:16px; flex-wrap:wrap;">
						<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--primary" onclick="return false;">Start a Project</a>
						<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--secondary" onclick="return false;">Book a Call</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     CARDS
     ═══════════════════════════════════════════ -->

<section id="cs-card" class="cpg__section">
	<h2 class="cpg__section-title">Cards</h2>

	<!-- ── Case Study Card ── -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Case Study Card <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.cs-card</code> · Used on: case study archive</div>
		<div class="cpg__preview cpg__preview--secondary">
			<div class="cpg__preview-inner" style="display:flex; gap:24px; flex-wrap:wrap;">
				<div style="max-width:320px; flex:1; min-width:260px;">
					<a class="cs-card" href="#" onclick="return false;" style="display:block; text-decoration:none;">
						<div class="cs-card__image" style="height:180px; display:flex; align-items:center; justify-content:center; font-size:13px; color:var(--pb-text-muted);">Featured Image</div>
						<div class="cs-card__body">
							<span class="cs-card__tag">Visual Identity</span>
							<h3 class="cs-card__title">Brand Redesign Project</h3>
							<p class="cs-card__stat">312% organic traffic increase</p>
						</div>
					</a>
				</div>
				<div style="max-width:320px; flex:1; min-width:260px;">
					<a class="cs-card" href="#" onclick="return false;" style="display:block; text-decoration:none;">
						<div class="cs-card__image" style="height:180px; display:flex; align-items:center; justify-content:center; font-size:13px; color:var(--pb-text-muted);">Featured Image</div>
						<div class="cs-card__body">
							<span class="cs-card__tag">Organic Revenue</span>
							<h3 class="cs-card__title">SEO Growth Campaign</h3>
							<p class="cs-card__stat">£1.2M revenue generated</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<!-- ── Blog Article Card ── -->
	<div id="article-card" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Blog Article Card <span class="cpg__component-status cpg__component-status--partial">Partial</span></h3>
		<div class="cpg__component-meta"><code>.article</code> · Used on: blog archive, related posts, search</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="display:flex; gap:24px; flex-wrap:wrap;">
				<div class="article" style="max-width:320px; flex:1; min-width:260px;">
					<div class="article_pic" style="height:180px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:13px; color:var(--pb-text-muted); background:var(--pb-bg-secondary);">Featured Image</div>
					<div class="article_des">
						<span>March 12, 2026</span>
						<h2><a href="#" onclick="return false;">How AI Is Transforming Digital Marketing</a></h2>
					</div>
				</div>
				<div class="article" style="max-width:320px; flex:1; min-width:260px;">
					<div class="article_pic" style="height:180px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:13px; color:var(--pb-text-muted); background:var(--pb-bg-secondary);">Featured Image</div>
					<div class="article_des">
						<span>March 5, 2026</span>
						<h2><a href="#" onclick="return false;">The Complete Guide to Commercial SEO</a></h2>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ── Resource Card ── -->
	<div id="resource-card" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Resource Card <span class="cpg__component-status cpg__component-status--missing">Missing Light</span></h3>
		<div class="cpg__component-meta"><code>.single_book</code> · Used on: resource archive, related resources</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="book_div" style="display:flex; gap:24px; flex-wrap:wrap;">
					<div class="single_book" style="max-width:280px; flex:1; min-width:220px;">
						<span style="display:block; height:140px; border-radius:8px; background:var(--pb-bg-secondary); display:flex; align-items:center; justify-content:center; font-size:13px; color:var(--pb-text-muted);">Thumbnail</span>
						<h3><a href="#" onclick="return false;">SEO Playbook 2026</a></h3>
						<p>The complete guide to organic growth strategies.</p>
						<a href="#" class="primary_btn" onclick="return false;">Download Free</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ── Help / Service Box ── -->
	<div id="help-box" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Help / Service Box <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.help_businesBox</code> · Used on: service pages, our work singles</div>
		<div class="cpg__preview cpg__preview--secondary">
			<div class="cpg__preview-inner">
				<div class="help_businesGrid digital_box" style="display:flex; gap:20px; flex-wrap:wrap;">
					<div class="help_businesBox" style="width:calc(33% - 14px); min-width:220px; flex:1;">
						<h3>Workflow Automation</h3>
						<p>Eliminate manual tasks and connect your systems with intelligent automation.</p>
					</div>
					<div class="help_businesBox" style="width:calc(33% - 14px); min-width:220px; flex:1;">
						<h3>CRM Integration</h3>
						<p>Seamlessly connect your sales tools for a unified customer view.</p>
					</div>
					<div class="help_businesBox" style="width:calc(33% - 14px); min-width:220px; flex:1;">
						<h3>Data Pipelines</h3>
						<p>Automate your reporting and data flow between platforms.</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ── Service Pillar Card ── -->
	<div id="sv-pillar" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Service Pillar Card <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.sv-pillar</code> · Used on: services overview</div>
		<div class="cpg__preview cpg__preview--secondary">
			<div class="cpg__preview-inner">
				<div class="sv-pillars__grid" style="display:grid; grid-template-columns:repeat(2, 1fr); gap:20px;">
					<div class="sv-pillar sv-pillar--ai" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<span class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="3"/></svg>
						</span>
						<h2 class="sv-pillar__name">AI Automation</h2>
						<p class="sv-pillar__desc">Eliminate repetitive work. Connect your systems.</p>
						<span class="sv-pillar__link">Learn more &rarr;</span>
					</div>
					<div class="sv-pillar sv-pillar--search" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<span class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
						</span>
						<h2 class="sv-pillar__name">Organic Search</h2>
						<p class="sv-pillar__desc">Build compounding visibility that turns search into revenue.</p>
						<span class="sv-pillar__link">Learn more &rarr;</span>
					</div>
					<div class="sv-pillar sv-pillar--web" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<span class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
						</span>
						<h2 class="sv-pillar__name">Web Design</h2>
						<p class="sv-pillar__desc">Fast, strategic, built to convert.</p>
						<span class="sv-pillar__link">Learn more &rarr;</span>
					</div>
					<div class="sv-pillar sv-pillar--brand" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<span class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="13.5" cy="6.5" r="2.5"/></svg>
						</span>
						<h2 class="sv-pillar__name">Branding</h2>
						<p class="sv-pillar__desc">Visual identities that communicate quality.</p>
						<span class="sv-pillar__link">Learn more &rarr;</span>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ── Team Card ── -->
	<div id="team-card" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Team Member Card <span class="cpg__component-status cpg__component-status--partial">Partial</span></h3>
		<div class="cpg__component-meta"><code>.team_proudbrand_box</code> · Used on: about page</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<div class="team_proudbrand_row" style="display:flex; gap:30px; flex-wrap:wrap;">
					<div class="team_proudbrand_box" style="max-width:200px; text-align:center;">
						<div class="team_hexagon" style="width:140px; height:160px; margin:0 auto 20px;">
							<div class="team_img" style="width:100%; height:100%; background:var(--pb-bg-secondary); clip-path:polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); display:flex; align-items:center; justify-content:center; font-size:12px; color:var(--pb-text-muted);">Photo</div>
						</div>
						<div class="team_proudbrand_des">
							<h3>Sean Brannon</h3>
							<small>Founder & CEO</small>
							<p>Building brands that drive real growth.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ── Believing Box ── -->
	<div id="believing-box" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Believing Box (Numbered) <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.believing_Box</code> · Used on: about page, services</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<section class="believing_sect" style="padding:0;">
					<div class="believing_grid d-grid w-100 position-relative" style="grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));">
						<div class="believing_Box float-start w-100">
							<h3>Brand Strategy</h3>
							<p>Define your position and own your market space.</p>
						</div>
						<div class="believing_Box float-start w-100">
							<h3>Visual Identity</h3>
							<p>Look like the leader your customers expect.</p>
						</div>
						<div class="believing_Box float-start w-100">
							<h3>Digital Marketing</h3>
							<p>Get found, get chosen, get results.</p>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     HEROES
     ═══════════════════════════════════════════ -->

<section id="hero-service" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Heroes & Banners</h2>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Service Banner Hero <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.srvcs_bnr</code> · Used on: all service sub-pages</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="srvcs_bnr" style="min-height:auto; height:auto; padding:60px 30px;">
					<div class="srvcs_bnrDes float-start w-100">
						<div class="srvcs_bnrDesRow float-end w-100">
							<span>AI Automation</span>
							<h1>Stop doing manually what <strong class="typing-effect">machines can do</strong></h1>
							<p>Eliminate repetitive work and connect your systems with intelligent automation.</p>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div id="hero-sv" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Services Overview Hero <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.sv-hero</code> · Used on: services overview page</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="sv-hero" style="min-height:auto; height:auto; padding:80px 30px; position:relative;">
					<div class="sv-hero__overlay" style="position:absolute; inset:0;"></div>
					<div class="container position-relative" style="text-align:center;">
						<span class="sv-hero__label">What We Do</span>
						<h1 class="sv-hero__title">We grow brands.<br><strong class="typing-effect">Four ways.</strong></h1>
						<p class="sv-hero__descriptor">AI automation. Organic search. Web design. Branding.</p>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div id="hero-cs" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Case Study Hero <span class="cpg__component-status cpg__component-status--dark-only">Always Dark</span></h3>
		<div class="cpg__component-meta"><code>.cs-hero</code> · Used on: case study singles (stays dark in both modes)</div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="cs-hero cs-hero--visual" style="min-height:auto; height:auto; padding:80px 30px; display:flex; align-items:center; justify-content:center; background:linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.8) 100%), #1a1a1a;">
					<div class="container" style="text-align:center; width:100%;">
						<span class="cs-hero__tag">Visual Identity</span>
						<h1 class="cs-hero__title" style="color:#fff;">Transforming Brand Presence</h1>
						<p class="cs-hero__descriptor" style="color:rgba(255,255,255,0.6);">A complete visual identity redesign that increased brand recognition by 240%.</p>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div id="hero-blog" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Blog Detail Hero <span class="cpg__component-status cpg__component-status--missing">Missing Light</span></h3>
		<div class="cpg__component-meta"><code>.blog_dtl_top_sec</code> · Used on: single blog posts</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="blog_dtl_top_sec" style="padding:60px 30px;">
					<div class="blog_dtl_top_div">
						<div class="blog_dtl_title">
							<span>March 12, 2026</span>
							<h1>The Complete Guide to AI-Powered Marketing in 2026</h1>
							<p>Everything you need to know about leveraging AI for growth.</p>
							<h2 style="font-size:14px; font-weight:400;">By Sean Brannon &middot; 8 min read</h2>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div id="hero-about" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">About Hero <span class="cpg__component-status cpg__component-status--partial">Partial</span></h3>
		<div class="cpg__component-meta"><code>.about_top_sec</code> · Used on: about page</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="about_top_sec" style="padding:60px 30px; text-align:center;">
					<div class="container">
						<div class="about_title" style="position:relative;"><h1 style="color:var(--pb-text-primary);">We Are Proud Brands</h1></div>
						<div class="about_des" style="display:flex; justify-content:center;"><p style="color:var(--pb-text-secondary); font-size:23px; line-height:1.6; float:none; text-align:center;">A full-service digital agency building brands that drive measurable growth.</p></div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     SECTIONS
     ═══════════════════════════════════════════ -->

<section id="build-steps" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Sections</h2>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Build Steps <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.build_sec</code> · <code>.build_div</code> · Used on: service pages</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="build_sec" style="padding:60px 30px;">
					<div class="container">
						<div class="build_div w-100 float-start text-center" style="padding-bottom:0;">
							<span>Our Process</span>
							<h2>How we <strong class="typing-effect">build</strong></h2>
							<ul class="d-grid overflow-hidden" style="grid-template-columns:repeat(3, 1fr); gap:30px;">
								<li>
									<h3>Discovery</h3>
									<small>1</small>
									<p>We map your current state and identify quick wins.</p>
								</li>
								<li>
									<h3>Build</h3>
									<small>2</small>
									<p>We design, develop, and deploy your solution.</p>
								</li>
								<li>
									<h3>Optimise</h3>
									<small>3</small>
									<p>We iterate, improve, and scale what works.</p>
								</li>
							</ul>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div id="digital-partner" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Digital Partner Grid (6-Box) <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.build_sec .digital_partner</code> · Used on: service pages (section 9)</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="build_sec" style="padding:60px 30px;">
					<div class="container">
						<div class="digital_partner w-100 float-start text-center">
							<h2>Here's how we make sure <strong class="typing-effect">it works</strong></h2>
							<div class="help_businesGrid digital_box w-100">
								<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
									<h3>Workflow Automation</h3>
									<p>Eliminate manual tasks and connect your systems with intelligent automation.</p>
								</div>
								<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
									<h3>CRM Integration</h3>
									<p>Seamlessly connect your sales tools for a unified customer view.</p>
								</div>
								<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
									<h3>Data Pipelines</h3>
									<p>Automate your reporting and data flow between platforms.</p>
								</div>
								<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
									<h3>Custom Dashboards</h3>
									<p>Real-time analytics tailored to your business KPIs.</p>
								</div>
								<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
									<h3>AI Content Tools</h3>
									<p>Leverage machine learning to scale content production.</p>
								</div>
								<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
									<h3>Ongoing Optimisation</h3>
									<p>Continuous improvement cycles driven by performance data.</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div id="stats-counter" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Stats Counter Bar <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.sv-stats</code> · Used on: services overview</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="sv-stats" style="padding:50px 30px;">
					<div class="container">
						<div class="sv-stats__grid">
							<div class="sv-stats__item">
								<h3 class="sv-stats__number">200+</h3>
								<p class="sv-stats__label">Projects Delivered</p>
							</div>
							<div class="sv-stats__item">
								<h3 class="sv-stats__number">&pound;12M+</h3>
								<p class="sv-stats__label">Revenue Generated</p>
							</div>
							<div class="sv-stats__item">
								<h3 class="sv-stats__number">10+</h3>
								<p class="sv-stats__label">Years in Business</p>
							</div>
							<div class="sv-stats__item">
								<h3 class="sv-stats__number">97%</h3>
								<p class="sv-stats__label">Client Retention</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div id="snapshot" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Snapshot Bar <span class="cpg__component-status cpg__component-status--dark-only">Always Dark</span></h3>
		<div class="cpg__component-meta"><code>.cs-snapshot</code> · Used on: case study singles</div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="cs-snapshot" style="padding:40px 30px; background:#1a1a1a;">
					<div class="container">
						<div class="cs-snapshot__grid" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:24px;">
							<div class="cs-snapshot__item">
								<span class="cs-snapshot__icon">
									<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2AB473" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
								</span>
								<h4 class="cs-snapshot__headline" style="color:#fff;">Timeline</h4>
								<p class="cs-snapshot__subtext" style="color:#767676;">8 weeks delivery</p>
							</div>
							<div class="cs-snapshot__item">
								<span class="cs-snapshot__icon">
									<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#8BC53F" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/></svg>
								</span>
								<h4 class="cs-snapshot__headline" style="color:#fff;">Industry</h4>
								<p class="cs-snapshot__subtext" style="color:#767676;">SaaS / Technology</p>
							</div>
							<div class="cs-snapshot__item">
								<span class="cs-snapshot__icon">
									<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#44C6EF" stroke-width="1.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg>
								</span>
								<h4 class="cs-snapshot__headline" style="color:#fff;">Result</h4>
								<p class="cs-snapshot__subtext" style="color:#767676;">312% traffic increase</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div id="testimonial" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Testimonial <span class="cpg__component-status cpg__component-status--partial">Partial</span></h3>
		<div class="cpg__component-meta"><code>.testi_sec</code> · Used on: about, our work, case studies</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="testi_sec" style="padding:60px 30px;">
					<div class="container">
						<div class="testi_div text-center">
							<p>&ldquo;ProudBrands completely transformed our digital presence. The results speak for themselves — 400% increase in qualified leads.&rdquo;</p>
							<h3>Jane Smith <span>CEO, TechCorp Ltd</span></h3>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div id="faq" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">FAQ Accordion <span class="cpg__component-status cpg__component-status--partial">Partial</span></h3>
		<div class="cpg__component-meta"><code>.faq_sec</code> · Bootstrap accordion · Used on: contact, homepage, services</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner">
				<section class="faq_sec" style="padding:0;">
					<div class="accordion" id="cpgFaqAccordion">
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpgFaq1" aria-expanded="false">How long does a typical project take?</button>
							</h2>
							<div id="cpgFaq1" class="accordion-collapse collapse" data-bs-parent="#cpgFaqAccordion">
								<div class="accordion-body">Most projects take between 6–12 weeks depending on scope. We'll give you a detailed timeline during discovery.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cpgFaq2" aria-expanded="true">What's included in your SEO service?</button>
							</h2>
							<div id="cpgFaq2" class="accordion-collapse collapse show" data-bs-parent="#cpgFaqAccordion">
								<div class="accordion-body">Our SEO service includes keyword research, content strategy, on-page optimisation, technical audits, and monthly reporting with clear KPIs.</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpgFaq3" aria-expanded="false">Do you offer ongoing support?</button>
							</h2>
							<div id="cpgFaq3" class="accordion-collapse collapse" data-bs-parent="#cpgFaqAccordion">
								<div class="accordion-body">Yes, we offer monthly retainer packages for ongoing development, SEO, and design support.</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div id="expert" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Expert Section <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.s_desgn_exprt_sec</code> · Used on: service sub-pages</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="s_desgn_exprt_sec" style="padding:60px 30px;">
					<div class="container">
						<div class="s_desgn_exprtGrid" style="display:grid; grid-template-columns:1fr 1fr; gap:30px;">
							<div class="s_desgn_exprt_left" style="border-radius:16px; padding:30px;">
								<h3 style="font-size:42px; font-weight:700; margin-bottom:8px;">97%</h3>
								<p style="margin:0;">Client retention rate across all services</p>
							</div>
							<div class="s_desgn_exprt_des">
								<span style="text-transform:uppercase; font-size:14px; color:var(--pb-text-muted); letter-spacing:2px; display:block; margin-bottom:12px;">Why Choose Us</span>
								<h2>We don't just deliver projects. We deliver results.</h2>
								<p>Every decision we make is grounded in data and aimed at commercial outcomes.</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<!-- ── Homepage Pillar Cards (What We Do) ── -->
	<div id="homepage-pillars" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Homepage Pillar Section <span class="cpg__component-status cpg__component-status--ok">Complete</span></h3>
		<div class="cpg__component-meta"><code>.sv-pillars--home</code> · <code>.sv-pillar--{ai|search|web|brand}</code> · Used on: homepage</div>
		<div class="cpg__preview cpg__preview--secondary">
			<div class="cpg__preview-inner">
				<div style="text-align:center; margin-bottom:40px;">
					<p class="sv-pillars__label">What We Do</p>
					<h2 style="font-size:clamp(28px, 3vw, 40px); font-weight:700; color:var(--pb-text-primary); margin:0;">Four services. One growth engine.</h2>
				</div>
				<div class="sv-pillars__grid" style="display:grid; grid-template-columns:repeat(2, 1fr); gap:30px;">
					<div class="sv-pillar sv-pillar--ai" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<div class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="3"/><line x1="12" y1="8" x2="12" y2="11"/><circle cx="8" cy="16" r="1"/><circle cx="16" cy="16" r="1"/></svg>
						</div>
						<h3 class="sv-pillar__name">AI Automation</h3>
						<p class="sv-pillar__desc">Eliminate repetitive work. Connect your systems. Let AI handle the tasks your team shouldn't be doing manually.</p>
						<span class="sv-pillar__link">Explore AI <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
					</div>
					<div class="sv-pillar sv-pillar--search" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<div class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/><circle cx="18" cy="4" r="2"/><line x1="18" y1="6" x2="18" y2="12"/></svg>
						</div>
						<h3 class="sv-pillar__name">Organic Search</h3>
						<p class="sv-pillar__desc">Get found by the right people. Build compounding visibility that turns search into your best sales channel.</p>
						<span class="sv-pillar__link">Explore SEO <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
					</div>
					<div class="sv-pillar sv-pillar--web" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<div class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><polyline points="7 8 10 11 7 14"/><line x1="13" y1="14" x2="17" y2="14"/></svg>
						</div>
						<h3 class="sv-pillar__name">Web Design</h3>
						<p class="sv-pillar__desc">Fast, strategic, built to convert. Websites that look premium and perform like a 24/7 sales team.</p>
						<span class="sv-pillar__link">Explore Web Design <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
					</div>
					<div class="sv-pillar sv-pillar--brand" style="cursor:default; overflow:hidden;">
						<div class="sv-pillar__accent"></div>
						<div class="sv-pillar__icon">
							<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="6.5" cy="13.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2"/></svg>
						</div>
						<h3 class="sv-pillar__name">Branding</h3>
						<p class="sv-pillar__desc">Look like the business you've become. Visual identities that communicate quality before a single word is read.</p>
						<span class="sv-pillar__link">Explore Branding <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     ALWAYS DARK
     ═══════════════════════════════════════════ -->

<section id="footer-cta" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Always Dark Sections</h2>
	<p class="cpg__section-desc">These sections stay dark in both modes by design. Toggle the theme — they shouldn't change.</p>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Footer CTA <span class="cpg__component-status cpg__component-status--dark-only">Always Dark</span></h3>
		<div class="cpg__component-meta"><code>.pb-footer-cta</code> · Used on: every page (footer.php)</div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="pb-footer-cta" style="padding:80px 30px; text-align:center;">
					<div class="pb-footer-cta__inner" style="text-align:center;">
						<h2 class="pb-footer-cta__heading">Ready to grow your brand?</h2>
						<p class="pb-footer-cta__subtext">Let's discuss how we can accelerate your digital growth.</p>
						<div class="pb-footer-cta__actions">
							<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--primary" onclick="return false;">Start a Project</a>
							<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--secondary" onclick="return false;">Book a Call</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div id="footer" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Footer <span class="cpg__component-status cpg__component-status--dark-only">Always Dark</span></h3>
		<div class="cpg__component-meta"><code>.footer</code> · <code>.footer_top</code> (4-col grid) · <code>.footer_bottom</code></div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:40px 30px;">
				<footer class="footer" style="position:static;">
					<div class="container">
						<div class="footer_top">
							<!-- Col 1: Brand -->
							<div class="footer__brand">
								<div class="ftr_logo" style="margin-bottom:16px;">
									<img src="<?php echo esc_url( $theme_uri ); ?>/images/logo.webp" alt="ProudBrands" style="max-width:180px; height:auto;">
								</div>
								<p class="footer__tagline">One agency. Every angle covered.</p>
							</div>

							<!-- Col 2: Services -->
							<div class="footer__col">
								<h3 class="footer__heading">Services</h3>
								<ul class="footer__nav">
									<li><a href="#" onclick="return false;">AI Automation</a></li>
									<li><a href="#" onclick="return false;">Organic Search</a></li>
									<li><a href="#" onclick="return false;">Web Design</a></li>
									<li><a href="#" onclick="return false;">Branding</a></li>
								</ul>
							</div>

							<!-- Col 3: Company -->
							<div class="footer__col">
								<h3 class="footer__heading">Company</h3>
								<ul class="footer__nav">
									<li><a href="#" onclick="return false;">About Us</a></li>
									<li><a href="#" onclick="return false;">Case Studies</a></li>
									<li><a href="#" onclick="return false;">Resources</a></li>
									<li><a href="#" onclick="return false;">Blog</a></li>
									<li><a href="#" onclick="return false;">Contact</a></li>
								</ul>
							</div>

							<!-- Col 4: Connect -->
							<div class="footer__col footer__connect">
								<h3 class="footer__heading">Connect</h3>
								<p class="footer__address">Proud Brands Ltd<br>Aylesbury, Buckinghamshire</p>
								<p class="footer__contact-link"><a href="#" onclick="return false;">hello@proudbrands.co.uk</a></p>
								<ul class="footer__socials">
									<li><a href="#" onclick="return false;" style="width:28px; height:28px; border-radius:50%; background:rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center;"><svg width="14" height="14" fill="#fff" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .595 0 1.325v21.351C0 23.405.595 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.595 1.323-1.325V1.325C24 .595 23.405 0 22.675 0z"/></svg></a></li>
									<li><a href="#" onclick="return false;" style="width:28px; height:28px; border-radius:50%; background:rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center;"><svg width="14" height="14" fill="#fff" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a></li>
									<li><a href="#" onclick="return false;" style="width:28px; height:28px; border-radius:50%; background:rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center;"><svg width="14" height="14" fill="#fff" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a></li>
								</ul>
							</div>
						</div>

						<div class="footer_bottom">
							<div class="footer_bottom__left">
								<p>&copy; 2026 ProudBrands Ltd. All rights reserved.</p>
								<ol class="footer_bottom__legal">
									<li>Company No: 12345678</li>
									<li><a href="#" onclick="return false;">Privacy Policy</a></li>
									<li><a href="#" onclick="return false;">Cookie Policy</a></li>
								</ol>
							</div>
							<div class="footer_bottom__right">
								<span id="cpg-back-to-top" title="Back to top" style="cursor:pointer; display:inline-flex;">
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none">
										<circle cx="20" cy="20" r="19" stroke="#373737" stroke-width="2"/>
										<path d="M14 22L20 16L26 22" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>

	<div id="marquee" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Marquee / Client Logos <span class="cpg__component-status cpg__component-status--dark-only">Always Dark</span></h3>
		<div class="cpg__component-meta"><code>.marquee_sec</code> · <code>.our_client_sect</code> · Used on: homepage, contact, about</div>

		<!-- Marquee strip -->
		<div class="cpg__preview cpg__preview--always-dark" style="margin-bottom:16px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="marquee_sec" style="padding:30px 0; overflow:hidden;">
					<div class="container text-center">
						<h2 style="font-size:14px; font-weight:400; color:#767676; text-transform:uppercase; letter-spacing:2px; margin-bottom:24px;">Trusted By</h2>
					</div>
					<div style="display:flex; gap:48px; align-items:center; justify-content:center; padding:0 30px; opacity:0.45;">
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><circle cx="18" cy="18" r="10" stroke="#767676" stroke-width="1.5"/><path d="M14 18h8M18 14v8" stroke="#767676" stroke-width="1.5"/><text x="38" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">Acme</text></svg>
						<svg width="110" height="36" viewBox="0 0 110 36" fill="none"><rect x="4" y="8" width="20" height="20" rx="4" stroke="#767676" stroke-width="1.5"/><text x="32" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">TechScale</text></svg>
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><polygon points="18,6 30,30 6,30" stroke="#767676" stroke-width="1.5" fill="none"/><text x="38" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">NovaBrand</text></svg>
						<svg width="90" height="36" viewBox="0 0 90 36" fill="none"><path d="M8 26C12 10 20 10 24 26" stroke="#767676" stroke-width="1.5" fill="none"/><text x="32" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">Optera</text></svg>
						<svg width="110" height="36" viewBox="0 0 110 36" fill="none"><circle cx="16" cy="18" r="12" stroke="#767676" stroke-width="1.5"/><circle cx="16" cy="18" r="5" stroke="#767676" stroke-width="1.5"/><text x="34" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">Greenline</text></svg>
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><path d="M6 28L18 8L30 28" stroke="#767676" stroke-width="1.5" fill="none"/><line x1="11" y1="20" x2="25" y2="20" stroke="#767676" stroke-width="1.5"/><text x="38" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">CloudPeak</text></svg>
					</div>
				</section>
			</div>
		</div>

		<!-- Client logos grid -->
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="our_client_sect" style="padding:60px 30px;">
					<div class="container">
						<h2 style="font-size:20px; font-weight:400; color:#767676; text-transform:uppercase; letter-spacing:2.4px; margin-bottom:25px;">Clients</h2>
						<p style="font-size:22px; font-weight:600; color:#fff; line-height:1.8; max-width:700px; margin-bottom:40px;">Brands we've helped grow — from startups to scale-ups.</p>
						<ul style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px; list-style:none; padding:0; margin:0;">
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#555" stroke-width="1.5"/><path d="M8 12h8M12 8v8" stroke="#555" stroke-width="1.5"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">Acme Corp</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="4" stroke="#555" stroke-width="1.5"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">TechScale</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><polygon points="12,3 22,21 2,21" stroke="#555" stroke-width="1.5" fill="none"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">NovaBrand</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 20C8 6 16 6 20 20" stroke="#555" stroke-width="1.5" fill="none"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">Optera</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#555" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke="#555" stroke-width="1.5"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">Greenline</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 20L12 4L20 20" stroke="#555" stroke-width="1.5" fill="none"/><line x1="7" y1="14" x2="17" y2="14" stroke="#555" stroke-width="1.5"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">CloudPeak</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 12l10 10 10-10z" stroke="#555" stroke-width="1.5" fill="none"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">Meridian</span>
								</div>
							</li>
							<li>
								<div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="#555" stroke-width="1.5" fill="none"/></svg>
									<span style="color:#555; font-size:13px; font-weight:600;">VoltEdge</span>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     LIGHT VERSIONS
     ═══════════════════════════════════════════ -->

<section id="light-header" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Light Versions</h2>
	<p class="cpg__section-desc">Light-mode alternatives for normally always-dark elements. Compare side-by-side with dark originals above.</p>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Header <span class="cpg__component-status cpg__component-status--light">Light Version</span></h3>
		<div class="cpg__component-meta"><code>.hdr_sec</code> · Currently always dark with <code>background: var(--black)</code></div>

		<!-- Dark original -->
		<p class="cpg__variant-label">Dark (current)</p>
		<div class="cpg__preview cpg__preview--always-dark" style="margin-bottom:16px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<header class="cpg-header-demo" style="background:#000; padding:20px 30px; position:relative;">
					<div style="display:flex; align-items:center; justify-content:space-between;">
						<div>
							<img src="<?php echo esc_url( $theme_uri ); ?>/images/logo.webp" alt="ProudBrands" style="max-width:160px; height:auto;">
						</div>
						<nav style="display:flex; gap:28px; align-items:center;">
							<a href="#" onclick="return false;" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:15px; font-weight:400;">About</a>
							<a href="#" onclick="return false;" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:15px; font-weight:400;">Services</a>
							<a href="#" onclick="return false;" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:15px; font-weight:400;">Our Work</a>
							<a href="#" onclick="return false;" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:15px; font-weight:400;">Blog</a>
							<a href="#" onclick="return false;" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:15px; font-weight:400;">Contact Us</a>
						</nav>
					</div>
					<div style="position:absolute; left:0; bottom:0; width:100%; height:1px; background:linear-gradient(90deg, #2AB473, #8BC53F, #F8B042, #F06522, #44C6EF);"></div>
				</header>
			</div>
		</div>

		<!-- Light version -->
		<p class="cpg__variant-label">Light (proposed)</p>
		<div class="cpg__preview cpg__preview--light-demo">
			<div class="cpg__preview-inner" style="padding:0;">
				<header class="cpg-header-demo" style="background:#ffffff; padding:20px 30px; position:relative; border-bottom:1px solid #e0e0e0;">
					<div style="display:flex; align-items:center; justify-content:space-between;">
						<div>
							<img src="<?php echo esc_url( $theme_uri ); ?>/light-theme-logo.png" alt="ProudBrands" style="max-width:160px; height:auto;">
						</div>
						<nav style="display:flex; gap:28px; align-items:center;">
							<a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:15px; font-weight:400;">About</a>
							<a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:15px; font-weight:400;">Services</a>
							<a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:15px; font-weight:400;">Our Work</a>
							<a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:15px; font-weight:400;">Blog</a>
							<a href="#" onclick="return false;" style="color:#1a1a1a; text-decoration:none; font-size:15px; font-weight:600;">Contact Us</a>
						</nav>
					</div>
					<div style="position:absolute; left:0; bottom:0; width:100%; height:1px; background:linear-gradient(90deg, #2AB473, #8BC53F, #F8B042, #F06522, #44C6EF);"></div>
				</header>
			</div>
		</div>
	</div>

	<div id="light-footer-cta" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Footer CTA <span class="cpg__component-status cpg__component-status--light">Light Version</span></h3>
		<div class="cpg__component-meta"><code>.pb-footer-cta</code> · Currently always dark <code>background: #0A0A0A</code></div>

		<!-- Dark original -->
		<p class="cpg__variant-label">Dark (current)</p>
		<div class="cpg__preview cpg__preview--always-dark" style="margin-bottom:16px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#0A0A0A; padding:80px 30px; text-align:center;">
					<div style="max-width:800px; margin:0 auto;">
						<h2 style="font-size:clamp(28px,4vw,45px); font-weight:700; color:#fff; margin-bottom:16px;">Ready to grow your brand?</h2>
						<p style="font-size:18px; color:rgba(255,255,255,0.55); margin-bottom:36px;">Let's discuss how we can accelerate your digital growth.</p>
						<div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
							<a href="#" onclick="return false;" class="pb-footer-cta__btn pb-footer-cta__btn--primary" style="color:#0A0A0A; background:#fff; border-color:#fff;">Start a Project</a>
							<a href="#" onclick="return false;" class="pb-footer-cta__btn pb-footer-cta__btn--secondary" style="color:#fff; border-color:#fff;">Book a Call</a>
						</div>
					</div>
				</section>
			</div>
		</div>

		<!-- Light version -->
		<p class="cpg__variant-label">Light (proposed)</p>
		<div class="cpg__preview cpg__preview--light-demo">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#f5f5f7; padding:80px 30px; text-align:center; border-top:3px solid; border-image:linear-gradient(90deg, #2AB473, #8BC53F, #F8B042, #F06522, #44C6EF) 1;">
					<div style="max-width:800px; margin:0 auto;">
						<h2 style="font-size:clamp(28px,4vw,45px); font-weight:700; color:#1a1a1a; margin-bottom:16px;">Ready to grow your brand?</h2>
						<p style="font-size:18px; color:#555555; margin-bottom:36px;">Let's discuss how we can accelerate your digital growth.</p>
						<div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
							<a href="#" onclick="return false;" style="display:inline-block; padding:14px 32px; font-size:16px; font-weight:600; border-radius:8px; text-decoration:none; background:#2AB473; color:#fff; border:2px solid #2AB473;">Start a Project</a>
							<a href="#" onclick="return false;" style="display:inline-block; padding:14px 32px; font-size:16px; font-weight:600; border-radius:8px; text-decoration:none; background:transparent; color:#1a1a1a; border:2px solid #1a1a1a;">Book a Call</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div id="light-footer" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Footer <span class="cpg__component-status cpg__component-status--light">Light Version</span></h3>
		<div class="cpg__component-meta"><code>.footer</code> · Currently always dark <code>background: #0A0A0A</code></div>

		<!-- Dark original -->
		<p class="cpg__variant-label">Dark (current)</p>
		<div class="cpg__preview cpg__preview--always-dark" style="margin-bottom:16px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<footer style="background:#0A0A0A; padding:40px 30px; position:static;">
					<div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:40px; padding-bottom:40px; border-bottom:1px solid #373737; margin-bottom:30px;">
						<div>
							<img src="<?php echo esc_url( $theme_uri ); ?>/images/logo.webp" alt="ProudBrands" style="max-width:180px; height:auto; margin-bottom:16px; display:block;">
							<p style="color:rgba(255,255,255,0.5); font-size:15px;">One agency. Every angle covered.</p>
						</div>
						<div>
							<h3 style="color:#fff; font-size:16px; font-weight:600; margin-bottom:16px;">Services</h3>
							<ul style="list-style:none; padding:0; margin:0;">
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">AI Automation</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Organic Search</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Web Design</a></li>
								<li><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Branding</a></li>
							</ul>
						</div>
						<div>
							<h3 style="color:#fff; font-size:16px; font-weight:600; margin-bottom:16px;">Company</h3>
							<ul style="list-style:none; padding:0; margin:0;">
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">About Us</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Case Studies</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Resources</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Blog</a></li>
								<li><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">Contact</a></li>
							</ul>
						</div>
						<div>
							<h3 style="color:#fff; font-size:16px; font-weight:600; margin-bottom:16px;">Connect</h3>
							<p style="color:rgba(255,255,255,0.5); font-size:14px; margin-bottom:8px;">Proud Brands Ltd<br>Aylesbury, Buckinghamshire</p>
							<p style="margin-bottom:16px;"><a href="#" onclick="return false;" style="color:rgba(255,255,255,0.5); text-decoration:none; font-size:14px;">hello@proudbrands.co.uk</a></p>
						</div>
					</div>
					<div style="display:flex; justify-content:space-between; align-items:center;">
						<p style="color:rgba(255,255,255,0.5); font-size:13px; margin:0;">&copy; 2026 ProudBrands Ltd. All rights reserved.</p>
					</div>
				</footer>
			</div>
		</div>

		<!-- Light version -->
		<p class="cpg__variant-label">Light (proposed)</p>
		<div class="cpg__preview cpg__preview--light-demo">
			<div class="cpg__preview-inner" style="padding:0;">
				<footer style="background:#ffffff; padding:40px 30px; position:static;">
					<div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:40px; padding-bottom:40px; border-bottom:1px solid #e0e0e0; margin-bottom:30px;">
						<div>
							<img src="<?php echo esc_url( $theme_uri ); ?>/light-theme-logo.png" alt="ProudBrands" style="max-width:180px; height:auto; margin-bottom:16px; display:block;">
							<p style="color:#888888; font-size:15px;">One agency. Every angle covered.</p>
						</div>
						<div>
							<h3 style="color:#1a1a1a; font-size:16px; font-weight:600; margin-bottom:16px;">Services</h3>
							<ul style="list-style:none; padding:0; margin:0;">
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">AI Automation</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Organic Search</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Web Design</a></li>
								<li><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Branding</a></li>
							</ul>
						</div>
						<div>
							<h3 style="color:#1a1a1a; font-size:16px; font-weight:600; margin-bottom:16px;">Company</h3>
							<ul style="list-style:none; padding:0; margin:0;">
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">About Us</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Case Studies</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Resources</a></li>
								<li style="margin-bottom:10px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Blog</a></li>
								<li><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">Contact</a></li>
							</ul>
						</div>
						<div>
							<h3 style="color:#1a1a1a; font-size:16px; font-weight:600; margin-bottom:16px;">Connect</h3>
							<p style="color:#888888; font-size:14px; margin-bottom:8px;">Proud Brands Ltd<br>Aylesbury, Buckinghamshire</p>
							<p style="margin-bottom:16px;"><a href="#" onclick="return false;" style="color:#555555; text-decoration:none; font-size:14px;">hello@proudbrands.co.uk</a></p>
						</div>
					</div>
					<div style="display:flex; justify-content:space-between; align-items:center;">
						<p style="color:#888888; font-size:13px; margin:0;">&copy; 2026 ProudBrands Ltd. All rights reserved.</p>
					</div>
				</footer>
			</div>
		</div>
	</div>

	<div id="light-marquee" class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Marquee / Client Logos <span class="cpg__component-status cpg__component-status--light">Light Version</span></h3>
		<div class="cpg__component-meta"><code>.marquee_sec</code> · <code>.our_client_sect</code> · Currently always dark</div>

		<!-- Dark original: Marquee -->
		<p class="cpg__variant-label">Marquee Strip — Dark (current)</p>
		<div class="cpg__preview cpg__preview--always-dark" style="margin-bottom:16px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#000; padding:30px 0; overflow:hidden;">
					<div class="container text-center">
						<h2 style="font-size:14px; font-weight:400; color:#767676; text-transform:uppercase; letter-spacing:2px; margin-bottom:24px;">Trusted By</h2>
					</div>
					<div style="display:flex; gap:48px; align-items:center; justify-content:center; padding:0 30px; opacity:0.45;">
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><circle cx="18" cy="18" r="10" stroke="#767676" stroke-width="1.5"/><path d="M14 18h8M18 14v8" stroke="#767676" stroke-width="1.5"/><text x="38" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">Acme</text></svg>
						<svg width="110" height="36" viewBox="0 0 110 36" fill="none"><rect x="4" y="8" width="20" height="20" rx="4" stroke="#767676" stroke-width="1.5"/><text x="32" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">TechScale</text></svg>
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><polygon points="18,6 30,30 6,30" stroke="#767676" stroke-width="1.5" fill="none"/><text x="38" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">NovaBrand</text></svg>
						<svg width="90" height="36" viewBox="0 0 90 36" fill="none"><path d="M8 26C12 10 20 10 24 26" stroke="#767676" stroke-width="1.5" fill="none"/><text x="32" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">Optera</text></svg>
						<svg width="110" height="36" viewBox="0 0 110 36" fill="none"><circle cx="16" cy="18" r="12" stroke="#767676" stroke-width="1.5"/><circle cx="16" cy="18" r="5" stroke="#767676" stroke-width="1.5"/><text x="34" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">Greenline</text></svg>
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><path d="M6 28L18 8L30 28" stroke="#767676" stroke-width="1.5" fill="none"/><line x1="11" y1="20" x2="25" y2="20" stroke="#767676" stroke-width="1.5"/><text x="38" y="22" fill="#767676" font-size="12" font-weight="600" font-family="sans-serif">CloudPeak</text></svg>
					</div>
				</section>
			</div>
		</div>

		<!-- Light version: Marquee -->
		<p class="cpg__variant-label">Marquee Strip — Light (proposed)</p>
		<div class="cpg__preview cpg__preview--light-demo" style="margin-bottom:24px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#f5f5f7; padding:30px 0; overflow:hidden; border-top:1px solid #e0e0e0; border-bottom:1px solid #e0e0e0;">
					<div class="container text-center">
						<h2 style="font-size:14px; font-weight:400; color:#888888; text-transform:uppercase; letter-spacing:2px; margin-bottom:24px;">Trusted By</h2>
					</div>
					<div style="display:flex; gap:48px; align-items:center; justify-content:center; padding:0 30px; opacity:0.55;">
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><circle cx="18" cy="18" r="10" stroke="#999" stroke-width="1.5"/><path d="M14 18h8M18 14v8" stroke="#999" stroke-width="1.5"/><text x="38" y="22" fill="#555" font-size="12" font-weight="600" font-family="sans-serif">Acme</text></svg>
						<svg width="110" height="36" viewBox="0 0 110 36" fill="none"><rect x="4" y="8" width="20" height="20" rx="4" stroke="#999" stroke-width="1.5"/><text x="32" y="22" fill="#555" font-size="12" font-weight="600" font-family="sans-serif">TechScale</text></svg>
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><polygon points="18,6 30,30 6,30" stroke="#999" stroke-width="1.5" fill="none"/><text x="38" y="22" fill="#555" font-size="12" font-weight="600" font-family="sans-serif">NovaBrand</text></svg>
						<svg width="90" height="36" viewBox="0 0 90 36" fill="none"><path d="M8 26C12 10 20 10 24 26" stroke="#999" stroke-width="1.5" fill="none"/><text x="32" y="22" fill="#555" font-size="12" font-weight="600" font-family="sans-serif">Optera</text></svg>
						<svg width="110" height="36" viewBox="0 0 110 36" fill="none"><circle cx="16" cy="18" r="12" stroke="#999" stroke-width="1.5"/><circle cx="16" cy="18" r="5" stroke="#999" stroke-width="1.5"/><text x="34" y="22" fill="#555" font-size="12" font-weight="600" font-family="sans-serif">Greenline</text></svg>
						<svg width="120" height="36" viewBox="0 0 120 36" fill="none"><path d="M6 28L18 8L30 28" stroke="#999" stroke-width="1.5" fill="none"/><line x1="11" y1="20" x2="25" y2="20" stroke="#999" stroke-width="1.5"/><text x="38" y="22" fill="#555" font-size="12" font-weight="600" font-family="sans-serif">CloudPeak</text></svg>
					</div>
				</section>
			</div>
		</div>

		<!-- Dark original: Client Logos Grid -->
		<p class="cpg__variant-label">Client Logos Grid — Dark (current)</p>
		<div class="cpg__preview cpg__preview--always-dark" style="margin-bottom:16px;">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#000; padding:60px 30px;">
					<div class="container">
						<h2 style="font-size:20px; font-weight:400; color:#767676; text-transform:uppercase; letter-spacing:2.4px; margin-bottom:25px;">Clients</h2>
						<p style="font-size:22px; font-weight:600; color:#fff; line-height:1.8; max-width:700px; margin-bottom:40px;">Brands we've helped grow — from startups to scale-ups.</p>
						<ul style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px; list-style:none; padding:0; margin:0;">
							<li><div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#555" stroke-width="1.5"/><path d="M8 12h8M12 8v8" stroke="#555" stroke-width="1.5"/></svg><span style="color:#555; font-size:13px; font-weight:600;">Acme Corp</span></div></li>
							<li><div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="4" stroke="#555" stroke-width="1.5"/></svg><span style="color:#555; font-size:13px; font-weight:600;">TechScale</span></div></li>
							<li><div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><polygon points="12,3 22,21 2,21" stroke="#555" stroke-width="1.5" fill="none"/></svg><span style="color:#555; font-size:13px; font-weight:600;">NovaBrand</span></div></li>
							<li><div style="height:90px; background:#141313; border-radius:15px; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 20C8 6 16 6 20 20" stroke="#555" stroke-width="1.5" fill="none"/></svg><span style="color:#555; font-size:13px; font-weight:600;">Optera</span></div></li>
						</ul>
					</div>
				</section>
			</div>
		</div>

		<!-- Light version: Client Logos Grid -->
		<p class="cpg__variant-label">Client Logos Grid — Light (proposed)</p>
		<div class="cpg__preview cpg__preview--light-demo">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#ffffff; padding:60px 30px;">
					<div class="container">
						<h2 style="font-size:20px; font-weight:400; color:#888888; text-transform:uppercase; letter-spacing:2.4px; margin-bottom:25px;">Clients</h2>
						<p style="font-size:22px; font-weight:600; color:#1a1a1a; line-height:1.8; max-width:700px; margin-bottom:40px;">Brands we've helped grow — from startups to scale-ups.</p>
						<ul style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px; list-style:none; padding:0; margin:0;">
							<li><div style="height:90px; background:#f5f5f7; border-radius:15px; border:1px solid #e0e0e0; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#999" stroke-width="1.5"/><path d="M8 12h8M12 8v8" stroke="#999" stroke-width="1.5"/></svg><span style="color:#555; font-size:13px; font-weight:600;">Acme Corp</span></div></li>
							<li><div style="height:90px; background:#f5f5f7; border-radius:15px; border:1px solid #e0e0e0; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="4" stroke="#999" stroke-width="1.5"/></svg><span style="color:#555; font-size:13px; font-weight:600;">TechScale</span></div></li>
							<li><div style="height:90px; background:#f5f5f7; border-radius:15px; border:1px solid #e0e0e0; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><polygon points="12,3 22,21 2,21" stroke="#999" stroke-width="1.5" fill="none"/></svg><span style="color:#555; font-size:13px; font-weight:600;">NovaBrand</span></div></li>
							<li><div style="height:90px; background:#f5f5f7; border-radius:15px; border:1px solid #e0e0e0; display:flex; align-items:center; justify-content:center; gap:8px; padding:15px;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 20C8 6 16 6 20 20" stroke="#999" stroke-width="1.5" fill="none"/></svg><span style="color:#555; font-size:13px; font-weight:600;">Optera</span></div></li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     FORMS
     ═══════════════════════════════════════════ -->

<section id="form-inputs" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Form Elements</h2>
	<p class="cpg__section-desc">Input fields and form controls. Toggle theme to check contrast and borders.</p>

	<div class="cpg__component">
		<h3 class="cpg__component-name">Form Inputs <span class="cpg__component-status cpg__component-status--partial">Partial</span></h3>
		<div class="cpg__component-meta"><code>.gform_wrapper</code> · <code>.form_sec</code> · Used on: contact, footer modal, resource download</div>
		<div class="cpg__preview cpg__preview--secondary">
			<div class="cpg__preview-inner">
				<div style="max-width:500px;">
					<h2 style="font-size:28px; font-weight:700; color:var(--pb-text-primary); margin-bottom:24px;">Get in Touch</h2>
					<div style="margin-bottom:20px;">
						<label style="font-size:14px; font-weight:600; color:var(--pb-text-secondary); display:block; margin-bottom:6px;">Full Name</label>
						<input type="text" placeholder="John Smith" style="width:100%; padding:14px 16px; background:transparent; border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; box-sizing:border-box;">
					</div>
					<div style="margin-bottom:20px;">
						<label style="font-size:14px; font-weight:600; color:var(--pb-text-secondary); display:block; margin-bottom:6px;">Email</label>
						<input type="email" placeholder="john@company.com" style="width:100%; padding:14px 16px; background:transparent; border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; box-sizing:border-box;">
					</div>
					<div style="margin-bottom:20px;">
						<label style="font-size:14px; font-weight:600; color:var(--pb-text-secondary); display:block; margin-bottom:6px;">Service</label>
						<select style="width:100%; padding:14px 16px; background:var(--pb-bg-secondary); border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; box-sizing:border-box; appearance:none; -webkit-appearance:none;">
							<option>Select a service...</option>
							<option>AI Automation</option>
							<option>Organic Search</option>
							<option>Web Design</option>
							<option>Branding</option>
						</select>
					</div>
					<div style="margin-bottom:20px;">
						<label style="font-size:14px; font-weight:600; color:var(--pb-text-secondary); display:block; margin-bottom:6px;">Message</label>
						<textarea rows="3" placeholder="Tell us about your project..." style="width:100%; padding:14px 16px; background:transparent; border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; resize:vertical; box-sizing:border-box;"></textarea>
					</div>
					<div style="display:flex; gap:16px; flex-wrap:wrap; align-items:center;">
						<a href="#" class="primary_btn" onclick="return false;">Submit</a>
						<a href="#" class="secondary_btn" onclick="return false;">Book a Call Instead</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ═══════════════════════════════════════════
     MOCKUPS — Mixed Components in Context
     ═══════════════════════════════════════════ -->

<section id="mockup-hero-cards" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Mockups — Components in Context</h2>
	<p class="cpg__section-desc">Full-width previews showing how components work together. Toggle theme to compare brand identity across modes.</p>

	<!-- ── Mockup 1: Hero + Service Pillars ── -->
	<div class="cpg__component" style="scroll-margin-top:100px;">
		<h3 class="cpg__component-name">Hero + Service Pillars</h3>
		<div class="cpg__component-meta">Simulated homepage fold — hero headline into pillar cards</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<!-- Hero section -->
				<section style="background:var(--pb-bg-primary); padding:80px 30px 40px; text-align:center;">
					<div class="container" style="max-width:900px;">
						<p style="color:#2AB473; font-size:14px; text-transform:uppercase; letter-spacing:3px; margin-bottom:16px; font-weight:600;">Full-Service Digital Agency</p>
						<h1 style="font-size:clamp(32px, 5vw, 56px); font-weight:800; line-height:1.1; margin-bottom:20px; color:var(--pb-text-primary);">We Build Brands That <strong class="typing-effect">Dominate Online</strong></h1>
						<p style="font-size:18px; color:var(--pb-text-secondary); max-width:650px; margin:0 auto 32px; line-height:1.7;">AI automation. Organic search. Web design. Branding. One agency, every angle covered.</p>
						<div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
							<a href="#" class="primary_btn" onclick="return false;">Start a Project</a>
							<a href="#" class="secondary_btn" onclick="return false;">See Our Work</a>
						</div>
					</div>
				</section>
				<!-- Gradient divider -->
				<div style="height:3px; background:linear-gradient(to right, #2AB473, #8BC53F, #FBAF42, #F06522, #44C6EF);"></div>
				<!-- Pillar cards -->
				<section style="background:var(--pb-bg-surface); padding:60px 30px 80px;">
					<div style="text-align:center; margin-bottom:40px;">
						<p class="sv-pillars__label">What We Do</p>
						<h2 style="font-size:clamp(28px, 3vw, 40px); font-weight:700; color:var(--pb-text-primary); margin:0;">Four services. One growth engine.</h2>
					</div>
					<div class="sv-pillars__grid" style="display:grid; grid-template-columns:repeat(2, 1fr); gap:30px;">
						<div class="sv-pillar sv-pillar--ai" style="cursor:default; overflow:hidden;">
							<div class="sv-pillar__accent"></div>
							<div class="sv-pillar__icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="3"/></svg></div>
							<h3 class="sv-pillar__name">AI Automation</h3>
							<p class="sv-pillar__desc">Eliminate repetitive work. Connect your systems.</p>
							<span class="sv-pillar__link">Explore AI <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
						</div>
						<div class="sv-pillar sv-pillar--search" style="cursor:default; overflow:hidden;">
							<div class="sv-pillar__accent"></div>
							<div class="sv-pillar__icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
							<h3 class="sv-pillar__name">Organic Search</h3>
							<p class="sv-pillar__desc">Build compounding visibility that turns search into revenue.</p>
							<span class="sv-pillar__link">Explore SEO <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
						</div>
						<div class="sv-pillar sv-pillar--web" style="cursor:default; overflow:hidden;">
							<div class="sv-pillar__accent"></div>
							<div class="sv-pillar__icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
							<h3 class="sv-pillar__name">Web Design</h3>
							<p class="sv-pillar__desc">Fast, strategic, built to convert.</p>
							<span class="sv-pillar__link">Explore Web Design <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
						</div>
						<div class="sv-pillar sv-pillar--brand" style="cursor:default; overflow:hidden;">
							<div class="sv-pillar__accent"></div>
							<div class="sv-pillar__icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="13.5" cy="6.5" r="2.5"/></svg></div>
							<h3 class="sv-pillar__name">Branding</h3>
							<p class="sv-pillar__desc">Visual identities that communicate quality.</p>
							<span class="sv-pillar__link">Explore Branding <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


<!-- ── Mockup 2: Brand Accent Rows ── -->
<section id="mockup-accent-rows" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Brand Accent Background Rows</h2>
	<p class="cpg__section-desc">Full-width rows with brand colour accent backgrounds at 8–12% opacity. Shows how colour can add energy to both themes.</p>

	<!-- Green accent row -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Green Accent — Feature Highlight</h3>
		<div class="cpg__component-meta">Background: <code>rgba(42, 180, 115, 0.10)</code> · Stats + text content</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:rgba(42, 180, 115, 0.10); padding:80px 30px;">
					<div class="container">
						<div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;">
							<div>
								<p style="color:#2AB473; font-size:14px; text-transform:uppercase; letter-spacing:3px; margin-bottom:12px; font-weight:600;">Why Choose Proud Brands</p>
								<h2 style="font-size:clamp(28px, 4vw, 42px); font-weight:800; line-height:1.15; margin-bottom:20px; color:var(--pb-text-primary);">Growth isn't a guess.<br>It's a system.</h2>
								<p style="font-size:17px; color:var(--pb-text-secondary); line-height:1.7; margin-bottom:28px;">We combine data-led organic search, conversion-focused design, and intelligent automation into a single growth engine. No silos. No wasted budget.</p>
								<a href="#" class="primary_btn" onclick="return false;">Book a Free Consultation</a>
							</div>
							<div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
								<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-radius:16px; padding:30px; text-align:center;">
									<h3 style="font-size:42px; font-weight:800; color:#2AB473; margin-bottom:4px;">97%</h3>
									<p style="font-size:14px; color:var(--pb-text-muted); margin:0;">Client Retention</p>
								</div>
								<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-radius:16px; padding:30px; text-align:center;">
									<h3 style="font-size:42px; font-weight:800; color:#8BC53F; margin-bottom:4px;">312%</h3>
									<p style="font-size:14px; color:var(--pb-text-muted); margin:0;">Avg. Traffic Lift</p>
								</div>
								<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-radius:16px; padding:30px; text-align:center;">
									<h3 style="font-size:42px; font-weight:800; color:#FBAF42; margin-bottom:4px;">4.9★</h3>
									<p style="font-size:14px; color:var(--pb-text-muted); margin:0;">Google Rating</p>
								</div>
								<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-radius:16px; padding:30px; text-align:center;">
									<h3 style="font-size:42px; font-weight:800; color:#44C6EF; margin-bottom:4px;">63+</h3>
									<p style="font-size:14px; color:var(--pb-text-muted); margin:0;">Active Clients</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Lime accent row -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Lime Accent — Testimonial + CTA</h3>
		<div class="cpg__component-meta">Background: <code>rgba(139, 198, 63, 0.08)</code> · Testimonial quote with action</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:rgba(139, 198, 63, 0.08); padding:80px 30px;">
					<div class="container" style="max-width:900px; text-align:center;">
						<svg width="48" height="48" viewBox="0 0 24 24" fill="none" style="margin-bottom:24px; opacity:0.3;"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" fill="var(--pb-text-muted)"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z" fill="var(--pb-text-muted)"/></svg>
						<blockquote style="margin:0 0 24px;">
							<p style="font-size:clamp(20px, 3vw, 28px); font-weight:600; line-height:1.5; color:var(--pb-text-primary); font-style:italic;">"Proud Brands didn't just redesign our website — they rebuilt our entire digital presence. Organic traffic is up 340% and leads have tripled."</p>
						</blockquote>
						<p style="font-size:16px; font-weight:700; color:var(--pb-text-primary); margin-bottom:4px;">James Mitchell</p>
						<p style="font-size:14px; color:var(--pb-text-muted); margin-bottom:32px;">Managing Director, TechScale UK</p>
						<div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
							<a href="#" class="primary_btn" onclick="return false;">Start Your Project</a>
							<a href="#" class="secondary_btn" onclick="return false;">Read Case Study</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Orange accent row -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Orange Accent — Service Boxes</h3>
		<div class="cpg__component-meta">Background: <code>rgba(248, 176, 66, 0.08)</code> · Help/service box cards on coloured row</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:rgba(248, 176, 66, 0.08); padding:80px 30px;">
					<div class="container">
						<div style="text-align:center; margin-bottom:48px;">
							<p style="color:#FBAF42; font-size:14px; text-transform:uppercase; letter-spacing:3px; margin-bottom:12px; font-weight:600;">How We Help</p>
							<h2 style="font-size:clamp(28px, 4vw, 40px); font-weight:800; color:var(--pb-text-primary); margin-bottom:12px;">Everything your business needs to grow online</h2>
							<p style="font-size:17px; color:var(--pb-text-secondary); max-width:600px; margin:0 auto;">From strategy to execution, we handle every layer of your digital presence.</p>
						</div>
						<div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:20px;">
							<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-top:3px solid #2AB473; border-radius:16px; padding:32px 24px;">
								<h3 style="font-size:22px; font-weight:700; color:var(--pb-text-primary); margin-bottom:12px;">Technical SEO</h3>
								<p style="font-size:16px; color:var(--pb-text-secondary); line-height:1.6; margin:0;">Site architecture, Core Web Vitals, and crawl optimisation that sets the foundation for rankings.</p>
							</div>
							<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-top:3px solid #8BC53F; border-radius:16px; padding:32px 24px;">
								<h3 style="font-size:22px; font-weight:700; color:var(--pb-text-primary); margin-bottom:12px;">Content Strategy</h3>
								<p style="font-size:16px; color:var(--pb-text-secondary); line-height:1.6; margin:0;">Data-driven content that targets high-intent keywords and builds topical authority.</p>
							</div>
							<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-top:3px solid #FBAF42; border-radius:16px; padding:32px 24px;">
								<h3 style="font-size:22px; font-weight:700; color:var(--pb-text-primary); margin-bottom:12px;">UX &amp; Conversion</h3>
								<p style="font-size:16px; color:var(--pb-text-secondary); line-height:1.6; margin:0;">Interfaces designed to convert visitors into customers with clear user journeys.</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Cyan accent row -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Cyan Accent — Newsletter / Lead Capture</h3>
		<div class="cpg__component-meta">Background: <code>rgba(68, 198, 239, 0.08)</code> · Form + value prop</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:rgba(68, 198, 239, 0.08); padding:80px 30px;">
					<div class="container">
						<div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;">
							<div>
								<p style="color:#44C6EF; font-size:14px; text-transform:uppercase; letter-spacing:3px; margin-bottom:12px; font-weight:600;">Free Resource</p>
								<h2 style="font-size:clamp(26px, 3.5vw, 38px); font-weight:800; line-height:1.15; margin-bottom:16px; color:var(--pb-text-primary);">The 2026 SEO Playbook for B2B Brands</h2>
								<p style="font-size:17px; color:var(--pb-text-secondary); line-height:1.7; margin-bottom:24px;">47 pages of actionable strategy, real client data, and the exact frameworks we use to drive organic revenue.</p>
								<ul style="list-style:none; padding:0; margin:0 0 28px; display:flex; flex-direction:column; gap:10px;">
									<li style="display:flex; align-items:center; gap:10px; font-size:15px; color:var(--pb-text-secondary);"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2AB473" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Keyword clustering frameworks</li>
									<li style="display:flex; align-items:center; gap:10px; font-size:15px; color:var(--pb-text-secondary);"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2AB473" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Content velocity benchmarks</li>
									<li style="display:flex; align-items:center; gap:10px; font-size:15px; color:var(--pb-text-secondary);"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2AB473" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Technical audit checklist</li>
								</ul>
							</div>
							<div style="background:var(--pb-bg-surface); border:1px solid var(--pb-border); border-radius:16px; padding:40px;">
								<h3 style="font-size:22px; font-weight:700; color:var(--pb-text-primary); margin-bottom:24px;">Download Free Guide</h3>
								<div style="margin-bottom:16px;">
									<input type="text" placeholder="Full Name" style="width:100%; padding:14px 16px; background:transparent; border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; box-sizing:border-box;">
								</div>
								<div style="margin-bottom:16px;">
									<input type="email" placeholder="Work Email" style="width:100%; padding:14px 16px; background:transparent; border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; box-sizing:border-box;">
								</div>
								<div style="margin-bottom:20px;">
									<input type="text" placeholder="Company" style="width:100%; padding:14px 16px; background:transparent; border:1px solid var(--pb-border); border-radius:8px; color:var(--pb-text-primary); font-size:15px; font-family:inherit; box-sizing:border-box;">
								</div>
								<a href="#" class="primary_btn" onclick="return false;" style="width:100%; text-align:center; display:block;">Get the Playbook</a>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


<!-- ── Mockup 3: Brand Overlay on Dark Theme ── -->
<section id="mockup-brand-overlay" class="cpg__section" style="scroll-margin-top:100px;">
	<h2 class="cpg__section-title">Brand Overlay — Dark Theme</h2>
	<p class="cpg__section-desc">Brand accent colours overlaid on the dark theme. These rows stay visually rich regardless of mode toggle.</p>

	<!-- Deep green overlay -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Deep Green — Stats Bar + Heading</h3>
		<div class="cpg__component-meta">Background: <code>rgba(42, 180, 115, 0.06)</code> on <code>#0A0A0A</code></div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:linear-gradient(135deg, rgba(42,180,115,0.06) 0%, rgba(139,198,63,0.04) 100%); padding:80px 30px;">
					<div class="container" style="text-align:center; max-width:1000px;">
						<p style="color:#2AB473; font-size:14px; text-transform:uppercase; letter-spacing:3px; margin-bottom:16px; font-weight:600;">Proven Results</p>
						<h2 style="font-size:clamp(30px, 4vw, 48px); font-weight:800; line-height:1.15; color:var(--pb-text-primary); margin-bottom:48px;">Numbers that speak louder than pitches</h2>
						<div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:30px;">
							<div style="padding:24px;">
								<h3 style="font-size:48px; font-weight:800; color:#2AB473; margin-bottom:8px;">14</h3>
								<p style="font-size:14px; color:#767676; margin:0;">Years in Business</p>
							</div>
							<div style="padding:24px;">
								<h3 style="font-size:48px; font-weight:800; color:#8BC53F; margin-bottom:8px;">340%</h3>
								<p style="font-size:14px; color:#767676; margin:0;">Avg. Traffic Growth</p>
							</div>
							<div style="padding:24px;">
								<h3 style="font-size:48px; font-weight:800; color:#FBAF42; margin-bottom:8px;">97%</h3>
								<p style="font-size:14px; color:#767676; margin:0;">Retention Rate</p>
							</div>
							<div style="padding:24px;">
								<h3 style="font-size:48px; font-weight:800; color:#44C6EF; margin-bottom:8px;">200+</h3>
								<p style="font-size:14px; color:#767676; margin:0;">Projects Delivered</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Multi-colour gradient border strip -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Gradient Divider + CTA Banner</h3>
		<div class="cpg__component-meta">Full brand gradient strip into a dark CTA section</div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<!-- Gradient strip -->
				<div style="height:4px; background:linear-gradient(to right, #2AB473, #8BC53F, #FBAF42, #F06522, #44C6EF);"></div>
				<section class="pb-footer-cta" style="padding:80px 30px; text-align:center;">
					<div class="pb-footer-cta__inner" style="max-width:800px; margin:0 auto; text-align:center;">
						<h2 class="pb-footer-cta__heading" style="margin-bottom:16px;">Ready to see what's possible?</h2>
						<p class="pb-footer-cta__subtext" style="margin-bottom:36px;">No fluff. No generic proposals. Just a straight conversation about how we'd grow your business.</p>
						<div class="pb-footer-cta__actions">
							<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--primary" onclick="return false;">Book a Strategy Call</a>
							<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--secondary" onclick="return false;">View Case Studies</a>
						</div>
					</div>
				</section>
				<!-- Bottom gradient strip -->
				<div style="height:4px; background:linear-gradient(to right, #44C6EF, #F06522, #FBAF42, #8BC53F, #2AB473);"></div>
			</div>
		</div>
	</div>

	<!-- Mixed dark card row with subtle colour accents -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Dark Cards with Colour Accent Borders</h3>
		<div class="cpg__component-meta">Service cards on dark background with brand top-border colours</div>
		<div class="cpg__preview cpg__preview--always-dark">
			<div class="cpg__preview-inner" style="padding:0;">
				<section style="background:#151515; padding:80px 30px;">
					<div class="container">
						<div style="text-align:center; margin-bottom:48px;">
							<p style="color:#2AB473; font-size:14px; text-transform:uppercase; letter-spacing:3px; margin-bottom:12px; font-weight:600;">Our Process</p>
							<h2 style="font-size:clamp(28px, 4vw, 40px); font-weight:800; color:#fff; margin-bottom:12px;">Four phases to predictable growth</h2>
							<p style="font-size:17px; color:#b0b0b0; max-width:600px; margin:0 auto;">Every engagement follows our proven framework — from audit to acceleration.</p>
						</div>
						<div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;">
							<div style="background:rgba(255,255,255,0.02); border:1px solid #373737; border-top:3px solid #2AB473; border-radius:16px; padding:32px 24px;">
								<span style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:rgba(42,180,115,0.1); margin-bottom:20px; font-size:20px; font-weight:800; color:#2AB473;">01</span>
								<h3 style="font-size:20px; font-weight:700; color:#fff; margin-bottom:10px;">Discover</h3>
								<p style="font-size:15px; color:rgba(255,255,255,0.6); line-height:1.6; margin:0;">Deep audit of your market, competitors, and current digital performance.</p>
							</div>
							<div style="background:rgba(255,255,255,0.02); border:1px solid #373737; border-top:3px solid #8BC53F; border-radius:16px; padding:32px 24px;">
								<span style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:rgba(139,198,63,0.1); margin-bottom:20px; font-size:20px; font-weight:800; color:#8BC53F;">02</span>
								<h3 style="font-size:20px; font-weight:700; color:#fff; margin-bottom:10px;">Strategise</h3>
								<p style="font-size:15px; color:rgba(255,255,255,0.6); line-height:1.6; margin:0;">Build a roadmap targeting quick wins and long-term compounding gains.</p>
							</div>
							<div style="background:rgba(255,255,255,0.02); border:1px solid #373737; border-top:3px solid #FBAF42; border-radius:16px; padding:32px 24px;">
								<span style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:rgba(248,176,66,0.1); margin-bottom:20px; font-size:20px; font-weight:800; color:#FBAF42;">03</span>
								<h3 style="font-size:20px; font-weight:700; color:#fff; margin-bottom:10px;">Execute</h3>
								<p style="font-size:15px; color:rgba(255,255,255,0.6); line-height:1.6; margin:0;">Design, develop, optimise, and automate — all handled in-house.</p>
							</div>
							<div style="background:rgba(255,255,255,0.02); border:1px solid #373737; border-top:3px solid #44C6EF; border-radius:16px; padding:32px 24px;">
								<span style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:rgba(68,198,239,0.1); margin-bottom:20px; font-size:20px; font-weight:800; color:#44C6EF;">04</span>
								<h3 style="font-size:20px; font-weight:700; color:#fff; margin-bottom:10px;">Accelerate</h3>
								<p style="font-size:15px; color:rgba(255,255,255,0.6); line-height:1.6; margin:0;">Measure, iterate, and scale what works. Monthly reporting. No guesswork.</p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Full brand gradient background -->
	<div class="cpg__component">
		<h3 class="cpg__component-name">Full Gradient Background — Bold CTA</h3>
		<div class="cpg__component-meta">Bold brand gradient as a section background — works in both modes</div>
		<div class="cpg__preview">
			<div class="cpg__preview-inner" style="padding:0;">
				<section class="pb-footer-cta" style="background:linear-gradient(135deg, #2AB473 0%, #1a7a4a 40%, #151515 100%); padding:100px 30px; text-align:center;">
					<div class="pb-footer-cta__inner" style="max-width:800px; margin:0 auto; text-align:center;">
						<h2 class="pb-footer-cta__heading" style="margin-bottom:20px;">Let's build something <em style="font-style:normal; color:#8BC53F;">extraordinary</em></h2>
						<p class="pb-footer-cta__subtext" style="margin-bottom:40px;">One conversation could change the trajectory of your business. We've seen it happen hundreds of times.</p>
						<div class="pb-footer-cta__actions">
							<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--primary" onclick="return false;">Start a Project</a>
							<a href="#" class="pb-footer-cta__btn pb-footer-cta__btn--secondary" onclick="return false;">See Our Work</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>


</main>
</div>
</div>

<?php get_footer(); ?>
