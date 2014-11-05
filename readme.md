## Compass Creative Laravel Project Boilerplate

## New Project

```bash
# Clone as new project
git clone https://github.com/compasscreative/laravel.git your-project-name

# Switch to new project folder
cd your-project-name

# Install Composer dependencies
composer install

# Migrate the database
php artisan migrate

# Seed the database
php artisan db:seed

# Download NPM components
npm update

# Download Bower components
node_modules/bower/bin/bower update

# Start local development server
php artisan serve
```

## Redesign

```bash
# Create new redesign branch
git branch redesign

# Switch to new branch
git checkout redesign

# Delete all old project files, ie:
rm -rf public

# Add Laravel remote
git remote add laravel https://github.com/compasscreative/laravel.git

# Fetch Laravel master branch
git fetch laravel master

# Merge Laravel master branch
git merge --squash laravel/master

# Remove Laravel remote
git remote remove laravel
```

## Features

- Filename-based cache busting in internal server
- Database configuration defaults to SQLite
- Simple ready-to-go Twitter Bootstrap based control panel
- Default website views and routes
- Team editor
- Basic contact form
- Appropriate timezone set
- Sensible front-end (public) defaults
- Mandrill mail driver enabled by default