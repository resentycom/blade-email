<x-blade-email::layout 
    title="Weekly Newsletter" 
    preheader="This week's highlights and updates from our team"
>
    <x-blade-email::header 
        title="Weekly Newsletter"
        titleSize="28px"
        padding="40px 40px 30px 40px"
    />
    
    <x-blade-email::body>
        <x-blade-email::text tag="p" fontSize="14px" color="#6b7280" margin="0 0 30px 0">
            {{ date('F j, Y') }} • Issue #{{ $issueNumber ?? '1' }}
        </x-blade-email::text>
        
        <x-blade-email::section backgroundColor="#f1f5f9" padding="30px">
            <x-blade-email::text tag="h2" fontSize="22px" fontWeight="bold" margin="0 0 15px 0">
                🎉 This Week's Highlights
            </x-blade-email::text>
            
            <x-blade-email::text margin="0 0 20px 0">
                We shipped some amazing updates this week that we think you'll love. Here's what's new:
            </x-blade-email::text>
            
            <x-blade-email::row>
                <x-blade-email::column width="50%" padding="0 15px 0 0">
                    <x-blade-email::text tag="h3" fontSize="16px" fontWeight="bold" margin="0 0 10px 0">
                        🚀 New Dashboard
                    </x-blade-email::text>
                    <x-blade-email::text fontSize="14px" margin="0">
                        Completely redesigned for better usability and performance.
                    </x-blade-email::text>
                </x-blade-email::column>
                
                <x-blade-email::column width="50%" padding="0 0 0 15px">
                    <x-blade-email::text tag="h3" fontSize="16px" fontWeight="bold" margin="0 0 10px 0">
                        📊 Advanced Analytics
                    </x-blade-email::text>
                    <x-blade-email::text fontSize="14px" margin="0">
                        New insights and reporting capabilities to track your progress.
                    </x-blade-email::text>
                </x-blade-email::column>
            </x-blade-email::row>
        </x-blade-email::section>
        
        <x-blade-email::spacer height="40px" />
        
        <x-blade-email::text tag="h2" fontSize="20px" fontWeight="bold" margin="0 0 20px 0">
            📚 Featured Articles
        </x-blade-email::text>
        
        @foreach([
            ['title' => '10 Tips for Better Productivity', 'url' => 'https://example.com/article-1'],
            ['title' => 'Understanding Modern Workflows', 'url' => 'https://example.com/article-2'],
            ['title' => 'Building Better Teams', 'url' => 'https://example.com/article-3']
        ] as $article)
            <x-blade-email::text margin="0 0 10px 0">
                • <a href="{{ $article['url'] }}" style="color: #2563eb; text-decoration: none;">{{ $article['title'] }}</a>
            </x-blade-email::text>
        @endforeach
        
        <x-blade-email::spacer height="30px" />
        
        <x-blade-email::divider />
        
        <x-blade-email::text tag="h2" fontSize="18px" fontWeight="bold" margin="20px 0 15px 0">
            💬 Community Spotlight
        </x-blade-email::text>
        
        <x-blade-email::text margin="0 0 20px 0">
            This week we're highlighting amazing work from our community members. Check out these inspiring projects and success stories.
        </x-blade-email::text>
        
        <x-blade-email::button 
            href="https://example.com/community" 
            backgroundColor="#10b981"
            align="left"
        >
            Visit Community
        </x-blade-email::button>
    </x-blade-email::body>
    
    <x-blade-email::footer borderTop="1px solid #e5e7eb">
        <x-blade-email::text fontSize="12px" color="#9ca3af">
            You're receiving this because you subscribed to our newsletter.<br>
            <a href="https://example.com/unsubscribe" style="color: #9ca3af;">Unsubscribe</a> | 
            <a href="https://example.com/archive" style="color: #9ca3af;">View Archive</a>
        </x-blade-email::text>
    </x-blade-email::footer>
</x-blade-email::layout>