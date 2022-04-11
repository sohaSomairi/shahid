<div>
    <div class="initiate-cards">
        @can('forqanshahid.managementUsers', Auth::user()->id)
        <a href="/management/users">
            <div class="initiate-card">
                <h1>إدارة المستخدمين </h1>
            </div>
        </a>
        @endcan
        @can('forqanshahid.managementGroups', Auth::user()->id)
        <a href="/management/groups">
            <div class="initiate-card">
                <h1> إدارة الصلاحيات</h1>
            </div>
        </a>
        @endcan
    </div>
</div>
