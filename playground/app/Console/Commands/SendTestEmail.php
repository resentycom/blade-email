<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestEmail extends Command
{
    protected $signature = 'email:test {template} {email} {--mailer=smtp}';

    protected $description = 'Send a test email template to specified address for cross-client testing';

    public function handle()
    {
        $template = $this->argument('template');
        $email = $this->argument('email');
        $mailer = $this->option('mailer');

        $templates = [
            'vercel-invite' => [
                'view' => 'vercel-invite-user',
                'subject' => 'Join the team on Vercel',
                'data' => [
                    'teamName' => 'Test Team',
                    'inviterName' => 'Test User',
                    'inviterEmail' => 'test@example.com',
                    'invitedUsername' => 'testuser',
                    'inviteUrl' => 'https://vercel.com',
                    'vercelLogoUrl' => 'https://assets.vercel.com/image/upload/v1588805858/repositories/vercel/logo.png',
                    'userImageUrl' => 'https://via.placeholder.com/64x64',
                    'arrowImageUrl' => 'https://via.placeholder.com/12x9',
                    'teamImageUrl' => 'https://via.placeholder.com/64x64',
                    'ipAddress' => '204.13.186.218',
                    'location' => 'São Paulo, Brazil',
                ],
            ],
            'plaid-verify' => [
                'view' => 'plaid-verify-identity',
                'subject' => 'Verify your identity',
                'data' => [
                    'validationCode' => '123456',
                    'logoUrl' => 'https://via.placeholder.com/212x88?text=PLAID',
                ],
            ],
            'font-example' => [
                'view' => 'font-example',
                'subject' => 'Font Component Demo',
                'data' => [],
            ],
            'dropbox-reset' => [
                'view' => 'dropbox-reset-password',
                'subject' => 'Reset your Dropbox password',
                'data' => [
                    'userFirstname' => 'John',
                    'resetPasswordLink' => 'https://www.dropbox.com/reset-password',
                    'helpCenterLink' => 'https://help.dropbox.com/security',
                    'logoUrl' => 'https://via.placeholder.com/40x33?text=DB',
                ],
            ],
            'nike-receipt' => [
                'view' => 'nike-receipt',
                'subject' => 'Your Nike Order is On Its Way',
                'data' => [
                    'trackingNumber' => '1ZV218970300071628',
                    'trackingUrl' => 'https://www.nike.com/orders/tracking',
                    'nikeLogoUrl' => 'https://via.placeholder.com/66x22?text=NIKE',
                    'customerName' => 'John Doe',
                    'shippingAddress' => '123 Main St, Anytown, CA 12345',
                    'productImageUrl' => 'https://via.placeholder.com/260x300?text=PRODUCT',
                    'productName' => 'Brazil 2022/23 Stadium Away Women\'s Nike Dri-FIT Soccer Jersey',
                    'productSize' => 'Size L (12–14)',
                    'orderNumber' => 'C0106373851',
                    'orderDate' => 'Nov 15, 2024',
                    'orderStatusUrl' => 'https://www.nike.com/orders',
                    'recommendation1Image' => 'https://via.placeholder.com/150x200?text=REC1',
                    'recommendation2Image' => 'https://via.placeholder.com/150x200?text=REC2',
                    'recommendation3Image' => 'https://via.placeholder.com/150x200?text=REC3',
                    'recommendation4Image' => 'https://via.placeholder.com/150x200?text=REC4',
                    'phoneIconUrl' => 'https://via.placeholder.com/16x26?text=P',
                ],
            ],
            'code-example' => [
                'view' => 'code-example',
                'subject' => 'Developer Newsletter - Code Examples',
                'data' => [],
            ],
        ];

        if (! isset($templates[$template])) {
            $this->error("Template '{$template}' not found. Available: ".implode(', ', array_keys($templates)));

            return 1;
        }

        $config = $templates[$template];

        try {
            Mail::mailer($mailer)->send([], [], function ($message) use ($email, $config) {
                $message->to($email)
                    ->subject($config['subject'])
                    ->html(view($config['view'], $config['data'])->render());
            });

            $this->info('✅ Test email sent successfully!');
            $this->line("📧 Template: {$template}");
            $this->line("📬 To: {$email}");
            $this->line("🚀 Mailer: {$mailer}");
            $this->line('');
            $this->line('💡 Testing Tips:');
            $this->line('• Forward this email to different email accounts');
            $this->line('• Check on mobile devices');
            $this->line('• Test with dark mode enabled');
            $this->line('• Use email testing services like Litmus or Email on Acid');

        } catch (\Exception $e) {
            $this->error('❌ Failed to send email: '.$e->getMessage());
            $this->line('');
            $this->line('🔧 Troubleshooting:');
            $this->line('• Check your mail configuration in .env');
            $this->line('• Try different mailer: --mailer=log');
            $this->line('• Verify SMTP credentials');

            return 1;
        }

        return 0;
    }
}
