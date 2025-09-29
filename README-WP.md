# Resume WordPress Theme

A modern, responsive WordPress theme for creating professional resume/CV websites.

## Features

- **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- **Customizable Profile**: Easy customization of personal information through WordPress Customizer
- **Social Media Integration**: Built-in support for LinkedIn, Telegram, and Instagram
- **Experience Section**: Display work experience with company logos and details
- **Projects Showcase**: Highlight your latest projects with descriptions and links
- **Skills Display**: Showcase technical skills with icons and categories
- **Bootstrap 5**: Built with Bootstrap 5 for modern UI components
- **Swiper Integration**: Smooth project carousel using Swiper.js
- **RTL Support**: Full support for Persian/Farsi language

## Installation

1. Download or clone this theme
2. Upload the theme folder to `/wp-content/themes/` directory
3. Activate the theme through the 'Themes' menu in WordPress
4. Go to **Appearance > Customize** to configure your profile information

## Configuration

### Profile Information
- Full Name
- Job Title
- Profile Image

### Contact Information
- Email Address
- Phone Number
- Address

### Social Media
- LinkedIn URL and Username
- Telegram URL and Username
- Instagram URL and Username

### Experience
The experience section is currently hardcoded in the theme. To make it fully customizable, you can:
1. Add custom fields in the Customizer
2. Use custom post types for experience entries
3. Use a page builder plugin

### Projects
Projects are currently hardcoded. To make them dynamic:
1. Create a custom post type for projects
2. Use the WordPress REST API
3. Integrate with a portfolio plugin

## File Structure

```
resume-theme/
├── style.css              # Theme header and main styles
├── index.php              # Main template file
├── header.php             # Header template
├── footer.php             # Footer template
├── sidebar.php            # Desktop sidebar
├── mobile-sidebar.php     # Mobile sidebar
├── functions.php          # Theme functions and customizer
├── src/                   # Original static assets
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   ├── img/              # Images and icons
│   └── fonts/            # Custom fonts
└── node_modules/         # Dependencies (Bootstrap, Swiper)
```

## Customization

### Adding Custom Experience Entries
Edit the `$experiences` array in `index.php` around line 25:

```php
$experiences = get_theme_mod('experiences', array(
    array(
        'company' => 'Your Company',
        'position' => 'Your Position',
        'period' => '2023 - Present',
        'location' => 'Your Location',
        'logo' => 'company-logo.svg'
    ),
    // Add more entries...
));
```

### Adding Custom Projects
Edit the `$projects` array in `index.php` around line 60:

```php
$projects = get_theme_mod('projects', array(
    array(
        'name' => 'Project Name',
        'description' => 'Project description...',
        'url' => 'https://project-url.com',
        'logo' => 'project-logo.svg'
    ),
    // Add more projects...
));
```

### Adding New Skills
Edit the skills section in `index.php` to add new skill categories or individual skills.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Credits

- **Bootstrap**: https://getbootstrap.com/
- **Swiper**: https://swiperjs.com/
- **Outfit Font**: https://fonts.google.com/specimen/Outfit
- **Icons**: Custom SVG icons

## License

This theme is licensed under the GPL v2 or later.

## Support

For support and customization requests, please contact the theme developer.

## Changelog

### Version 1.0.0
- Initial release
- WordPress theme conversion from static HTML
- Customizer integration
- Responsive design
- Social media integration