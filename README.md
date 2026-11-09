# Video Streaming Site

A PHP and MySQL video-sharing website: users sign up, upload videos, watch them in the browser, comment and rate. Admins moderate content.

## Features

- Sign up, log in and edit your profile.
- Upload videos with thumbnails.
- Watch videos with the Video.js player.
- Comments, ratings and view counters.
- Most-viewed listing, pagination and search.
- Admin area for managing and deleting content.

## Stack

- PHP, MySQL
- Video.js, jQuery
- Apache

## Setup

1. Import `db/video.sql` into MySQL.
2. Update the database credentials in `connect.php` / `mysql.php`.
3. Serve the folder with Apache (for example XAMPP or WAMP) and open `index.php`.
