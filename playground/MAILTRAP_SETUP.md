# Mailtrap Email Testing Setup

## Quick Setup Instructions

### 1. Sign up for Mailtrap
- Go to: https://mailtrap.io/signin
- Create a free account (1,000 emails/month included)

### 2. Get Your SMTP Credentials
1. Navigate to **Email Testing** → **Sandboxes**
2. Click on **"My Sandbox"** (created by default)
3. In the **Integration** tab, click **"Show Credentials"**
4. Copy the SMTP settings:
   ```
   Host: sandbox.smtp.mailtrap.io
   Port: 2525
   Username: [your_username]
   Password: [your_password]
   ```

### 3. Configure Your .env File
Add these settings to your `.env` file:
```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username_here
MAIL_PASSWORD=your_mailtrap_password_here
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@yourdomain.com
MAIL_FROM_NAME="Blade Email Test"
```

### 4. Test Your Setup
```bash
# Send a test email
php artisan email:test vercel-invite test@example.com

# Check Mailtrap inbox
# Go to your Mailtrap sandbox to see the email
```

## ✅ What You Get with Mailtrap

### **Email Testing Features:**
- ✅ **Safe Testing Environment** - No real emails sent
- ✅ **HTML/CSS Preview** - See exactly how emails render
- ✅ **Spam Analysis** - Check spam score before sending
- ✅ **Email Forwarding** - Forward to real inboxes for testing
- ✅ **Team Collaboration** - Share sandboxes with team members

### **Email Analysis:**
- ✅ **HTML Check** - Validates HTML/CSS compatibility
- ✅ **Headers Analysis** - Check email headers
- ✅ **Raw Source** - View raw email source
- ✅ **Client Preview** - Preview in different email clients

## 🧪 Testing Your Templates

### Send Test Emails:
```bash
# Test Vercel invite template
php artisan email:test vercel-invite test@example.com

# Test Plaid verification template
php artisan email:test plaid-verify test@example.com

# Test font example
php artisan email:test font-example test@example.com
```

### Check Results in Mailtrap:
1. Go to your Mailtrap dashboard
2. Click on **Email Testing** → **Sandboxes** → **My Sandbox**
3. You'll see all test emails in the inbox
4. Click any email to analyze:
   - **HTML Check** - Compatibility analysis
   - **Spam Analysis** - Spam score and suggestions
   - **Raw** - View source code
   - **Text** - Plain text version

## 🎯 Pro Testing Workflow

### 1. Development Testing
```bash
# Send to Mailtrap sandbox
php artisan email:test vercel-invite test@example.com
```

### 2. Visual Testing
- Check email in Mailtrap dashboard
- Use HTML Check for compatibility
- Verify Inter font loading
- Check mobile responsiveness

### 3. Forward to Real Clients
- Use Mailtrap's forwarding feature
- Forward to Gmail, Outlook, etc.
- Test on actual devices

### 4. Spam Testing
- Check spam score in Mailtrap
- Improve based on recommendations
- Aim for score 8/10 or higher

## 🔧 Troubleshooting

### Connection Issues:
```bash
# Test mail configuration
php artisan tinker
>>> Mail::raw('Test email', function($msg) { $msg->to('test@example.com')->subject('Test'); });
```

### Debug Mode:
```bash
# Enable mail logging
MAIL_LOG_CHANNEL=single

# Check logs
tail -f storage/logs/laravel.log
```

### Common Issues:
- ❌ **Wrong credentials** - Double-check username/password
- ❌ **Port blocked** - Try port 587 instead of 2525
- ❌ **TLS issues** - Verify MAIL_ENCRYPTION=tls

## 🎉 You're Ready!

1. ✅ Set up Mailtrap account
2. ✅ Configure SMTP credentials
3. ✅ Send test emails
4. ✅ Analyze results in dashboard
5. ✅ Forward to real email clients

**Start testing**: `php artisan email:test vercel-invite your-test@example.com`
