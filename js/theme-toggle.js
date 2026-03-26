/**
 * Theme Toggle — Light / Dark Mode
 *
 * Behaviour:
 * 1. Check localStorage for saved preference.
 * 2. If none, check prefers-color-scheme.
 * 3. Default to 'dark' (the site's original design).
 * 4. Persist choice to localStorage on toggle.
 * 5. Apply immediately on page load to avoid FOUC.
 */
(function () {
  'use strict';

  var STORAGE_KEY = 'pb-theme';

  /**
   * Read the saved or system-preferred theme.
   */
  function getPreferredTheme() {
    var saved = localStorage.getItem(STORAGE_KEY);
    if (saved === 'light' || saved === 'dark') {
      return saved;
    }
    // Respect OS preference if no explicit choice.
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) {
      return 'light';
    }
    return 'dark';
  }

  /**
   * Apply theme to <html> element.
   */
  function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
  }

  /**
   * Toggle between light and dark.
   */
  function toggleTheme() {
    var current = document.documentElement.getAttribute('data-theme') || 'dark';
    var next = current === 'dark' ? 'light' : 'dark';
    applyTheme(next);
    localStorage.setItem(STORAGE_KEY, next);
  }

  /**
   * Check if the current page is a dark-only page (no toggle).
   * These pages are always forced to dark mode.
   */
  // Dark-only pages: forced to dark, no toggle
  var DARK_ONLY = [
    'page-template-template-services',
    'page-template-template-contact',
    'page-template-template-blog',
    'page-template-template-about'
  ];

  // Light-default pages: forced to light, no toggle
  var LIGHT_DEFAULT = [
    'post-type-archive-case_study',
    'single-case_study'
  ];

  function hasBodyClass(classList) {
    var body = document.body || document.querySelector('body');
    if (!body) return false;
    for (var i = 0; i < classList.length; i++) {
      if (body.classList.contains(classList[i])) return true;
    }
    return false;
  }

  // ── Apply immediately (runs in <head> or early body) ──
  // If PHP already set data-theme on <html>, respect it to avoid FOUC.
  var phpTheme = document.documentElement.getAttribute('data-theme');
  if (!phpTheme) {
    applyTheme(getPreferredTheme());
  }

  // ── Bind toggle buttons once DOM is ready ──
  document.addEventListener('DOMContentLoaded', function () {
    var isLocked = hasBodyClass(DARK_ONLY) || hasBodyClass(LIGHT_DEFAULT);

    if (isLocked) {
      // Force the correct theme and hide toggle
      if (hasBodyClass(DARK_ONLY))    applyTheme('dark');
      if (hasBodyClass(LIGHT_DEFAULT)) applyTheme('light');

      var toggles = document.querySelectorAll('.pb-theme-toggle');
      for (var i = 0; i < toggles.length; i++) {
        toggles[i].style.display = 'none';
      }
      return;
    }

    var toggles = document.querySelectorAll('.pb-theme-toggle');
    for (var i = 0; i < toggles.length; i++) {
      toggles[i].addEventListener('click', toggleTheme);
    }
  });

  // ── Listen for OS preference changes (only on pages with toggle) ──
  if (window.matchMedia) {
    window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', function (e) {
      if (!localStorage.getItem(STORAGE_KEY) && !hasBodyClass(DARK_ONLY) && !hasBodyClass(LIGHT_DEFAULT)) {
        applyTheme(e.matches ? 'light' : 'dark');
      }
    });
  }
})();
