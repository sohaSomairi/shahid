<div>
    <div class="initiate-cards">
        @can('forqanshahid.initiateYears', Auth::user()->id)
            <a href="/initiate/years">
                <div class="initiate-card">
                    <h1>تهيئة الأعوام</h1>
                </div>
            </a>
        @endcan
        @can('forqanshahid.initiateSections', Auth::user()->id)
            <a href="/initiate/sections">
                <div class="initiate-card">
                    <h1>تهيئة الأقسام</h1>
                </div>
            </a>
        @endcan
        @can('forqanshahid.initiateFiletypes', Auth::user()->id)
            <a href="/initiate/filetypes">
                <div class="initiate-card">
                    <h1>انواع المرفقات</h1>
                </div>
            </a>
        @endcan
    </div>
</div>
