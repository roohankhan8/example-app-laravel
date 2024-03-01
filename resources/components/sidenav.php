<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        border: 1px solid black;
    }

    ul li {
        border: 1px solid black;
        padding: 1rem;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="text-bold">
            <a href="/dashboard">
                <li>Dashboard</li>
            </a>
            <a href="/reports">
                <li>Reports</li>
            </a>
            <a href="/charts">
                <li>Charts</li>
            </a>
            <!-- <form class="nav-item" action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form> -->
        </ul>
    </div>
</div>