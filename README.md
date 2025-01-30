# post-loop-cats
A Custom Post Loop Filter WP plugin for old-school "get my posts from categories already" made simple.


🎉 Welcome to the **Custom Post Loop Filter** WordPress plugin!

Have you ever wanted to display posts from specific categories on a page without any hassle? Well, now you can! This lightweight plugin allows you to fetch and showcase posts from multiple categories using a simple shortcode. How is this not built into WordPress already? 🤯

## 🚀 Features
- Display posts from one or more categories with ease.
- Customize the number of posts displayed.
- Automatically fetch category slugs and loop through posts dynamically.
- Responsive and visually appealing design.

## 🛠️ Installation
1. Download and install the plugin in your WordPress admin panel.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Use the shortcode on any page to display your custom post loop.

## 🎯 Usage
Simply add the following shortcode to any page:

```html
[post_loop_cats cat="slug1,slug2" posts_per_page="5"]
```

### Parameters:
- **`cat`** (required): Comma-separated category slugs.
- **`posts_per_page`** (optional): Number of posts to display (default: `5`).

### Example:
```html
[post_loop_cats cat="news,events" posts_per_page="3"]
```
This will display 3 posts from the categories `news` and `events`.

## 🎨 Output Structure
The shortcode generates a stylish post loop, complete with:
- **Featured images as backgrounds** 📸
- **Clickable post titles** 🔗
- **Category badges** 🎟️
- **Navigation buttons** ⏩

## 📌 Notes
- Ensure the category slugs are correct; otherwise, no posts will be displayed.
- Posts are retrieved dynamically, so changes in categories reflect instantly.

## ✨ Author
Developed by **Tibor Berki** many times before but this time, in all honesty, it took minutes with Anthropic Claude AI.

## 📜 License
This plugin is open-source and freely available under the MIT License. Feel free to modify and improve it!

Happy coding! 🚀

