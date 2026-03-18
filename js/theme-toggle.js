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

  // ── Apply immediately (runs in <head> or early body) ──
  applyTheme(getPreferredTheme());

  // ── Bind toggle buttons once DOM is ready ──
  document.addEventListener('DOMContentLoaded', function () {
    var toggles = document.querySelectorAll('.pb-theme-toggle');
    for (var i = 0; i < toggles.length; i++) {
      toggles[i].addEventListener('click', toggleTheme);
    }
  });

  // ── Listen for OS preference changes ──
  if (window.matchMedia) {
    window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', function (e) {
      // Only auto-switch if user hasn't manually chosen.
      if (!localStorage.getItem(STORAGE_KEY)) {
        applyTheme(e.matches ? 'light' : 'dark');
      }
    });
  }
})();
