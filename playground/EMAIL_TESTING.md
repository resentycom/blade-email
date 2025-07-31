# Email Template Testing Guide

This guide helps you test your email templates across different email clients and devices.

## 🚀 Quick Start Testing

### 1. Browser Testing (Development)
```bash
# View templates in browser
http://localhost:8000/test-email/vercel-invite
http://localhost:8000/test-email/plaid-verify
http://localhost:8000/test-email/font-example
```

### 2. Send Test Emails
```bash
# Send to your email address
php artisan email:test vercel-invite your-email@gmail.com

# Send using different mailer
php artisan email:test vercel-invite your-email@gmail.com --mailer=smtp
```

### 3. Generate HTML for Testing Services
```bash
# Get HTML output for Litmus/Email on Acid
php artisan email:client-test vercel-invite > test-email.html
```

## 📧 Email Client Testing Services

### **Litmus** (Recommended)
- **Best for**: Professional testing across 90+ clients
- **URL**: https://litmus.com
- **Features**: Screenshots, spam testing, analytics
- **Pricing**: $99/month (free trial available)

### **Email on Acid**
- **Best for**: Comprehensive client testing
- **URL**: https://www.emailonacid.com
- **Features**: Similar to Litmus, good spam analysis
- **Pricing**: $75/month (free trial available)

### **Mailtrap** (Development)
- **Best for**: Development and staging testing
- **URL**: https://mailtrap.io
- **Features**: HTML/CSS analysis, spam score
- **Pricing**: Free tier available

### **Mail-Tester** (Free)
- **Best for**: Quick spam score checking
- **URL**: https://www.mail-tester.com
- **Features**: Free spam analysis
- **Pricing**: Free

## 🔧 Local Testing Setup

### 1. Configure Mail Service

#### Option A: Mailtrap (Recommended for Development)
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@example.com
MAIL_FROM_NAME="Email Test"
```

#### Option B: Gmail SMTP
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Your Name"
```

#### Option C: Resend (Modern Service)
```env
MAIL_MAILER=resend
RESEND_KEY=your_resend_api_key
MAIL_FROM_ADDRESS=test@yourdomain.com
MAIL_FROM_NAME="Test Sender"
```

### 2. Test Email Sending
```bash
# Test basic email functionality
php artisan email:test vercel-invite test@example.com

# Check Laravel logs
tail -f storage/logs/laravel.log
```

## 📱 Manual Testing Checklist

### **Major Email Clients to Test:**
- ✅ **Gmail** (Web, iOS, Android)
- ✅ **Outlook** (Web, Desktop, Mobile)
- ✅ **Apple Mail** (Mac, iOS)
- ✅ **Yahoo Mail**
- ✅ **Thunderbird**

### **Testing Steps:**
1. **Desktop Testing**
   - Forward email to different providers
   - Test with various screen sizes
   - Check font rendering and fallbacks

2. **Mobile Testing**
   - iOS Mail app
   - Gmail mobile app
   - Outlook mobile app
   - Test portrait/landscape modes

3. **Dark Mode Testing**
   - Enable dark mode in email clients
   - Check text/background contrast
   - Verify images still display correctly

4. **Accessibility Testing**
   - Screen reader compatibility
   - High contrast mode
   - Text zoom (up to 200%)

## 🎯 Professional Testing Workflow

### Step 1: Development Testing
```bash
# 1. View in browser
open http://localhost:8000/test-email/vercel-invite

# 2. Send to yourself
php artisan email:test vercel-invite your-email@gmail.com

# 3. Check multiple devices
# Forward to iPhone, Android, etc.
```

### Step 2: Professional Testing
```bash
# 1. Generate HTML for testing services
php artisan email:client-test vercel-invite > vercel-test.html

# 2. Upload to Litmus/Email on Acid
# 3. Review results and fix issues
# 4. Repeat until satisfied
```

### Step 3: Spam Testing
```bash
# 1. Send to Mail-Tester
php artisan email:test vercel-invite your-test-id@mail-tester.com

# 2. Check results at mail-tester.com
# 3. Improve spam score if needed
```

## 🛠 Common Email Client Issues

### **Outlook Issues**
- Limited CSS support
- Use table-based layouts
- Inline styles preferred
- MSO conditional comments

### **Gmail Issues**
- CSS in `<style>` tags get stripped
- Use inline styles
- Limited `@media` query support

### **Mobile Issues**
- Font sizes too small
- Touch targets too small
- Images not loading by default
- Dark mode compatibility

## 📊 Testing Metrics to Track

- **Rendering accuracy** across clients
- **Font loading** success rate
- **Image display** rate
- **Link functionality**
- **Mobile responsiveness**
- **Spam score** (aim for 8/10+)
- **Load time** (keep under 102KB)

## 🔗 Useful Resources

- [Email Client CSS Support](https://www.campaignmonitor.com/css/)
- [Can I Email](https://www.caniemail.com/)
- [Email Development Best Practices](https://templates.mailchimp.com/development/)
- [MJML Documentation](https://mjml.io/)
