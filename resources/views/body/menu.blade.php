<body>
<div class="grid-x">
    <div class="large-12 cell">
        <div class="top-bar">
            <ul class="menu">
                <li class="menu-text" onclick="window.location.href='@path/view/'">
                    <img src="@path/assets/svg/symbol.svg">
                    <span>raise</span>
                </li>
                <li>
                    <button data-open="explore-modal" class="mega-button hide-for-small-only">explore</button>
                </li>
            </ul>
            <div class="top-bar-right show-for-large show-for-medium">
                <span class="label secondary">0</span> new notifications
            </div>
        </div>
    </div>
</div>
<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 cell hide-for-small-only">
            <br>
            <b class="saw">Announcement</b>
            <div class="announce">
                <div>
                    RAISe dashboard it's under development.
                </div>
                <button onclick="window.location.href='@path/manage/'">Logout</button>
            </div>
            <br>
        </div>
    </div>
</div>
<br class="show-for-small-only">
<script>
    window.base_url = '@path/';
</script>
<div class="reveal" id="explore-modal" data-reveal>
    <b class="saw">Explore at RAISe</b>
    <div style="display: flex;flex: 3">
        <input class="search_at" title="explore at raise" placeholder="search a tag, client or device..." type="text" style="margin: 0;border-radius: 4px 0 0 4px;border: 2px solid #8385D0;padding: 8px 10px;width:100%">
        <button style="padding: 4px 40px;border: none;border-radius: 0 4px 4px 0;background: #8385D0;color: #fff;">Search</button>
    </div>
    <br>
    <div class="grid-x">
        <div class="large-12 medium-12 small-12 cell">
            <ul class="search_results"></ul>
        </div>
    </div>
</div>