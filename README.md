# Wordpress boilerplate

### Starting a new wordpress boilerplate project

1. Clone the git repo - git clone git@github.com:charlesxmorrissey/wp-boilerplate.git
2. Run `composer install`
3. Create the database
4. Copy `.env.example` to `.env` and update environment variables:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`, etc)
  * `WP_HOME` - Full URL to WordPress home (http://example.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
