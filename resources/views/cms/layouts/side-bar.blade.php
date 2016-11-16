<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{ url('admin') }}"><i class="fa fa-fw fa-dashboard">&nbsp;</i> Dashboard</a>
        </li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#posts"><i class="fa fa-thumb-tack" aria-hidden="true" >&nbsp;</i> Post <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts" class="collapse">
                <li>
                    <a href="{{ url('admin/posts') }}"><i class="fa fa-file" aria-hidden="true">&nbsp;</i> All Posts</a>
                </li>
                <li>
                    <a href="{{ url('admin/posts/create') }}"><i class="fa fa-plus" aria-hidden="true">&nbsp;</i>Add New Post</a>
                </li>
                <li>
                    <a href="{{ url('admin/posts/category') }}">Categories</a>
                </li>
                <li>
                    <a href="#">Tags</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" id="lfm" data-input="thumbnail" data-preview="holder"><i class="fa fa-files-o" aria-hidden="true">&nbsp;</i>Files</a>
            <input id="thumbnail" class="form-control" type="hidden" name="filepath">
        </li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#pages"><i class="fa fa-file" aria-hidden="true">&nbsp;</i> Pages <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="pages" class="collapse">
                <li>
                    <a href="{{ url('admin/pages') }}"><i class="fa fa-file" aria-hidden="true">&nbsp;</i> All Pages</a>
                </li>
                <li>
                    <a href="{{ url('admin/pages/create') }}"><i class="fa fa-plus" aria-hidden="true">&nbsp;</i>Add New Page</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#users"><i class="fa fa-users" aria-hidden="true">&nbsp;</i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users" class="collapse">
                <li>
                    <a href="{{ url('admin/users') }}"><i class="fa fa-users" aria-hidden="true">&nbsp;</i>All Users</a>
                </li>
                <li>
                    <a href="{{ url('admin/users/create') }}"><i class="fa fa-users" aria-hidden="true">&nbsp;</i>Add User</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('admin/settings') }}"><i class="fa fa-cogs" aria-hidden="true">&nbsp;</i>Settings</a>
        </li>
    </ul>
</div>