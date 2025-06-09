@auth
<li>
    <details>
        <summary>
            Admin
        </summary>
        <ul class="p-2 z-20 bg-base-100">
            <li><a href="{{route('articles.index')}}">Articles</a></li>
            <li><a href="{{route('users.index')}}">Users</a></li>
        </ul>
    </details>
</li>
@endauth
