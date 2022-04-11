<div>
    <div class="initiate-cards">
        @can('forqanshahid.publishingTopics', Auth::user()->id)
            <a href="/publishing/topics">
                <div class="initiate-card">
                    <h1>المواضيع</h1>
                </div>
            </a>
        @endcan
        @can('forqanshahid.publishingTitles', Auth::user()->id)
            <a href="/publishing/titles">
                <div class="initiate-card">
                    <h1>العنواين</h1>
                </div>
            </a>
        @endcan
        @can('forqanshahid.publishingSlider', Auth::user()->id)
            <a href="/publishing/slider">
                <div class="initiate-card">
                    <h1>شرائح العرض</h1>
                </div>
            </a>
        @endcan
    </div>
</div>
