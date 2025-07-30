<x-email::layout>
    <x-email::container>
        <x-email::header>
            <h1>Welcome to Blade Email</h1>
        </x-email::header>

        <x-email::body>
            <x-email::section>
                <x-email::row>
                    <x-email::column>
                        <x-email::text>
                            <h2>Component Preview</h2>
                            <p>This is a preview of the Blade Email components. You can test all the available components here.</p>
                        </x-email::text>
                    </x-email::column>
                </x-email::row>

                <x-email::spacer height="20" />

                <x-email::row>
                    <x-email::column>
                        <x-email::button href="https://example.com" color="blue">
                            Click Me!
                        </x-email::button>
                    </x-email::column>
                </x-email::row>

                <x-email::spacer height="20" />

                <x-email::divider />

                <x-email::spacer height="20" />

                <x-email::row>
                    <x-email::column width="50%">
                        <x-email::text>
                            <h3>Left Column</h3>
                            <p>This is content in the left column.</p>
                        </x-email::text>
                    </x-email::column>
                    <x-email::column width="50%">
                        <x-email::text>
                            <h3>Right Column</h3>
                            <p>This is content in the right column.</p>
                        </x-email::text>
                    </x-email::column>
                </x-email::row>
            </x-email::section>
        </x-email::body>

        <x-email::footer>
            <x-email::text>
                <p>&copy; 2024 Your Company. All rights reserved.</p>
                <p>123 Main St, City, Country</p>
            </x-email::text>
        </x-email::footer>
    </x-email::container>
</x-email::layout>
