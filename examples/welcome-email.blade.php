<x-blade-email::layout
    title="Welcome to Our Platform"
    preheader="Thanks for joining us! Here's what you need to know to get started."
>
    <x-blade-email::header
        logo="https://example.com/logo.png"
        logoAlt="Company Logo"
        title="Welcome to Our Platform"
        :titleStyle="['color' => '#2563eb']"
    />

    <x-blade-email::body>
        <x-blade-email::text
            tag="h2"
            :style="[
                'font-size' => '20px',
                'font-weight' => 'bold',
                'margin-top' => '0',
                'margin-bottom' => '20px'
            ]"
        >
            Hello {{ $user->name ?? 'there' }}! 👋
        </x-blade-email::text>

        <x-blade-email::text>
            Welcome to our platform! We're thrilled to have you join our community of thousands of users who are already transforming their workflow.
        </x-blade-email::text>

        <x-blade-email::text>
            To help you get started, here are a few things you can do right away:
        </x-blade-email::text>

        <x-blade-email::spacer height="10px" />

        <x-blade-email::section :style="['background-color' => '#f8fafc', 'padding' => '20px']">
            <x-blade-email::text :style="['font-size' => '14px', 'margin-bottom' => '10px']">
                ✅ Complete your profile setup<br>
                ✅ Explore our getting started guide<br>
                ✅ Connect with your team members<br>
                ✅ Try our key features
            </x-blade-email::text>
        </x-blade-email::section>

        <x-blade-email::spacer height="30px" />

        <x-blade-email::button
            href="https://example.com/dashboard"
            :style="[
                'background-color' => '#2563eb',
                'padding' => '16px 32px',
                'font-size' => '16px'
            ]"
        >
            Go to Your Dashboard
        </x-blade-email::button>

        <x-blade-email::spacer height="30px" />

        <x-blade-email::divider color="#e5e7eb" />

        <x-blade-email::text :style="['font-size' => '14px', 'color' => '#6b7280']">
            Need help getting started? Our support team is here to help! Just reply to this email or visit our <a href="https://example.com/help" style="color: #2563eb;">help center</a>.
        </x-blade-email::text>
    </x-blade-email::body>

    <x-blade-email::footer :style="['border-top' => '1px solid #e5e7eb']">
        <x-blade-email::text
            :style="[
                'font-size' => '12px',
                'color' => '#9ca3af',
                'text-align' => 'center',
                'margin' => '0'
            ]"
        >
            © {{ date('Y') }} Your Company Name. All rights reserved.<br>
            123 Business St, City, State 12345<br>
            <a href="https://example.com/unsubscribe" style="color: #9ca3af;">Unsubscribe</a> |
            <a href="https://example.com/preferences" style="color: #9ca3af;">Email Preferences</a>
        </x-blade-email::text>
    </x-blade-email::footer>
</x-blade-email::layout>
