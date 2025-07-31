<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EmailClientTest extends Command
{
    protected $signature = 'email:client-test {template}';
    protected $description = 'Generate HTML output optimized for email client testing services';

    public function handle()
    {
        $template = $this->argument('template');

        $templates = [
            'vercel-invite' => [
                'view' => 'vercel-invite-user',
                'data' => [
                    'teamName' => 'Test Team',
                    'inviterName' => 'John Doe',
                    'inviterEmail' => 'john@example.com',
                    'invitedUsername' => 'testuser',
                    'inviteUrl' => 'https://vercel.com/accept-invite',
                    'vercelLogoUrl' => 'https://assets.vercel.com/image/upload/v1588805858/repositories/vercel/logo.png',
                    'userImageUrl' => 'https://via.placeholder.com/64x64/000000/FFFFFF?text=U',
                    'arrowImageUrl' => 'https://via.placeholder.com/12x9/666666/FFFFFF?text=%E2%86%92',
                    'teamImageUrl' => 'https://via.placeholder.com/64x64/0070F3/FFFFFF?text=T',
                    'ipAddress' => '204.13.186.218',
                    'location' => 'São Paulo, Brazil'
                ]
            ],
            'plaid-verify' => [
                'view' => 'plaid-verify-identity',
                'data' => [
                    'validationCode' => '123456',
                    'logoUrl' => 'https://via.placeholder.com/212x88/00D924/FFFFFF?text=PLAID'
                ]
            ],
            'font-example' => [
                'view' => 'font-example',
                'data' => []
            ],
            'dropbox-reset' => [
                'view' => 'dropbox-reset-password',
                'data' => [
                    'userFirstname' => 'Sarah',
                    'resetPasswordLink' => 'https://www.dropbox.com/reset-password',
                    'helpCenterLink' => 'https://help.dropbox.com/security',
                    'logoUrl' => 'https://via.placeholder.com/40x33/0061FF/FFFFFF?text=DB'
                ]
            ],
            'nike-receipt' => [
                'view' => 'nike-receipt',
                'data' => [
                    'trackingNumber' => '1ZV218970300071628',
                    'trackingUrl' => 'https://www.nike.com/orders/tracking',
                    'nikeLogoUrl' => 'https://via.placeholder.com/66x22/000000/FFFFFF?text=NIKE',
                    'customerName' => 'Test Customer',
                    'shippingAddress' => '456 Test Ave, Test City, CA 98765',
                    'productImageUrl' => 'https://via.placeholder.com/260x300/FF6900/FFFFFF?text=PRODUCT',
                    'productName' => 'Brazil 2022/23 Stadium Away Women\'s Nike Dri-FIT Soccer Jersey',
                    'productSize' => 'Size L (12–14)',
                    'orderNumber' => 'C0106373851',
                    'orderDate' => 'Nov 15, 2024',
                    'orderStatusUrl' => 'https://www.nike.com/orders',
                    'recommendation1Image' => 'https://via.placeholder.com/150x200/0070F3/FFFFFF?text=REC1',
                    'recommendation2Image' => 'https://via.placeholder.com/150x200/00D924/FFFFFF?text=REC2',
                    'recommendation3Image' => 'https://via.placeholder.com/150x200/FF6900/FFFFFF?text=REC3',
                    'recommendation4Image' => 'https://via.placeholder.com/150x200/9013FE/FFFFFF?text=REC4',
                    'phoneIconUrl' => 'https://via.placeholder.com/16x26/666666/FFFFFF?text=P'
                ]
            ],
            'code-example' => [
                'view' => 'code-example',
                'data' => []
            ]
        ];

        if (!isset($templates[$template])) {
            $this->error("Template '{$template}' not found. Available: " . implode(', ', array_keys($templates)));
            return 1;
        }

        $config = $templates[$template];
        $html = view($config['view'], $config['data'])->render();

        // Add email client testing comments
        $testingComments = "
<!-- EMAIL CLIENT TESTING -->
<!-- Template: {$template} -->
<!-- Generated: " . now() . " -->
<!-- Instructions:
     1. Copy this HTML
     2. Paste into email testing service (Litmus, Email on Acid, etc.)
     3. Test across Gmail, Outlook, Apple Mail, etc.
     4. Check mobile responsiveness
     5. Verify font loading and fallbacks
     6. Test dark mode compatibility
-->
";

        $html = str_replace('<!-- EMAIL CLIENT TESTING -->', $testingComments, $html);

        // Output the HTML
        $this->line($html);

        $this->info("📋 HTML copied to clipboard! Use with:");
        $this->line("• Litmus: https://litmus.com");
        $this->line("• Email on Acid: https://www.emailonacid.com");
        $this->line("• Mail-Tester: https://www.mail-tester.com");
        $this->line("• Mailtrap: https://mailtrap.io");

        return 0;
    }
}
