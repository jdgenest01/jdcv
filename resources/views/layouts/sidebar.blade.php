<nav class="bg-dark h-100 left-box-shadow-sm fixed-top w-15 mt-6 left-align ">
    <div class="w-100 pl-2 text-light p-1 border border-top-0 border-right-0 border-left-0 border-light"><a class="text-light" href="{{ route("admin.user.index") }}">Profil</a></div>
    <div class="w-100 pl-2 text-light p-1 border border-top-0 border-right-0 border-left-0 border-light"><a class="text-light" href="{{ route("admin.tags.index") }}">Tags</a></div>
    <div class="w-100 pl-2 text-light p-1 border border-top-0 border-right-0 border-left-0 border-light"><a class="text-light" href="{{ route("admin.groups.index") }}">Group</a></div>
    <div class="w-100 pl-2 text-light p-1"><a class="text-light" href="{{ route("admin.details.index") }}">Detail</a>

        @if ( Request()->route()->getPrefix() == "admin/details" )
            <ul>
                <li><a class="text-light" href="{{ route("admin.details.index") }}">List</a></li>
                <li><a class="text-light" href="{{ route("admin.details.create") }}">Add</a></li>
            </ul>
        @endif
    </div>
</nav>
