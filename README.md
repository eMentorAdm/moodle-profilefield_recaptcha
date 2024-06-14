# Recaptcha V3 - user profile field

This Moodle plugin adds a custom user profile field that integrates Google's reCAPTCHA v3 into the user signup process. By leveraging reCAPTCHA v3, this plugin helps protect your Moodle site from spam and abuse while ensuring a smooth user experience.

## Installation

1. **Download and Install the Plugin:**
   - Download the plugin files and place them in the appropriate directory in your Moodle installation (e.g., `your_moodle_directory/user/profile/field/recaptcha_v3`).
   - Navigate to the Site Administration area of your Moodle site.
   - Go to `Site administration -> Plugins -> Install plugins` and follow the prompts to complete the installation.

2. **Create the Custom Profile Field:**
   - Once the plugin is installed, navigate to `Site administration -> Users -> Accounts -> User profile fields`.
   - Click on the "Create a new profile field" button.
   - Select "reCAPTCHA v3" from the list of available field types.
   - Configure the field settings as needed. Ensure it is set to display on the signup form.

3. **Configure reCAPTCHA v3 Keys:**
   - Go to `Site administration -> Plugins -> User profile fields -> Manage user profile fields`.
   - Locate the reCAPTCHA v3 field and click on the "Settings" icon.
   - Enter the required reCAPTCHA v3 credentials (Site Key and Secret Key) which you can obtain from the [Google reCAPTCHA site](https://www.google.com/recaptcha).
   - Save your changes.

## Configuration

After the initial setup, the plugin requires minimal configuration:

- **Field Settings:**
  - Ensure that the custom reCAPTCHA v3 field is set to appear during the user signup process.
  - You can adjust other display and validation settings as needed.

- **reCAPTCHA v3 Settings:**
  - The Site Key and Secret Key are crucial for reCAPTCHA to function. Keep these keys secure and update them if necessary.

## Usage

Once configured, the reCAPTCHA v3 will appear on the user signup form, providing an added layer of security against automated bot signups. Users will not see the reCAPTCHA challenge explicitly, as reCAPTCHA v3 operates in the background to assess risk and ensure user interactions are legitimate.

## Troubleshooting

- **Error Messages:**
  - If users encounter issues during signup related to reCAPTCHA validation, double-check the Site Key and Secret Key.
  - Ensure that your Moodle site can communicate with the Google reCAPTCHA service (internet connectivity is required).

- **Field Visibility:**
  - If the reCAPTCHA field is not appearing on the signup form, verify that the custom profile field is enabled and set to display on the signup page.

