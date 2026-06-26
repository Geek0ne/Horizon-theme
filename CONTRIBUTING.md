# Contributing to Horizon Theme

Thank you for your interest in contributing to Horizon Theme!

## How to Contribute

### Reporting Bugs

1. Check [existing issues](https://github.com/Geek0ne/Horizon-theme/issues) to avoid duplicates
2. Create a new issue with:
   - Clear title
   - Steps to reproduce
   - Expected vs actual behavior
   - Browser/OS information
   - Screenshots if applicable

### Suggesting Features

1. Open an issue with the `feature-request` label
2. Describe the use case and expected behavior
3. Include mockups if possible

### Submitting Changes

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Make your changes
4. Run tests: `composer test`
5. Commit with clear messages: `git commit -m "feat: add new feature"`
6. Push and create a Pull Request

## Development Setup

### Prerequisites

- PHP 8.0+
- Composer
- Typecho 1.3+ (for testing)

### Installation

```bash
# Clone the repository
git clone https://github.com/Geek0ne/Horizon-theme.git

# Install dependencies
composer install

# Run tests
composer test
```

### CSS Build

```bash
# Minify CSS
./build.sh
```

## Code Style

### PHP

- Follow PSR-12 coding standards
- Add PHPDoc comments to all functions
- Use type declarations (PHP 8.0+)
- Escape all output with `htmlspecialchars()`

### CSS

- Use CSS Variables for theming
- Follow BEM naming convention
- Add `aria-hidden="true"` to decorative SVGs
- Support `prefers-reduced-motion`

### JavaScript

- Use vanilla JavaScript (no frameworks)
- Add `defer` attribute to script tags
- Follow ES6+ syntax

## Commit Messages

Use [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` New feature
- `fix:` Bug fix
- `docs:` Documentation
- `style:` CSS changes
- `refactor:` Code refactoring
- `perf:` Performance improvement
- `test:` Adding tests
- `chore:` Maintenance

## Pull Request Checklist

- [ ] Code follows project style
- [ ] Tests pass
- [ ] Documentation updated
- [ ] No console errors
- [ ] Responsive on mobile
- [ ] Accessible (keyboard navigation, screen readers)

## Questions?

Feel free to open an issue for any questions!
