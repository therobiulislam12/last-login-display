# Last Login Display

Show the last login date and time of users in the admin dashboard.

**Last Login Display** adds a new column to the "Users" page in the WordPress admin dashboard, which displays the last login date and time of each user.

**Features**:
– Tracks and displays the last login time of users.
– Adds a sortable column to the user list for easy organization.
– Helps admins monitor user activity.

## How it Works

1. The plugin automatically tracks users' login times when they log in.
2. The "Last Login" column will appear in the **Users** > **All Users** section of the admin dashboard.
3. You can sort users by their last login time using the new column.

## Usage

Once the plugin is activated:
– Navigate to **Users** > **All Users**.
– The **Last Login** column will display the last login date and time of each user.
– Users who have never logged in will show "Never" in the column.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/last-login-display` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to **Users** > **All Users** to view the last login times.

## Frequently Asked Questions

- Why is the last login time not showing for some users? =

  - If the user has never logged in, the "Last Login" column will show "Never." The plugin only tracks logins after it is activated. Also, the admin when it installed, it also show never.

- Can I sort users by their last login time? =

  - Yes, the "Last Login" column is sortable, allowing you to quickly see which users logged in most recently.

- Does this work with custom login forms? =

  - The plugin hooks into WordPress's native `wp_login` action, so it should work with custom login forms that use the default WordPress login system.
