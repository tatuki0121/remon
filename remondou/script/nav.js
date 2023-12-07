new Vue({
    el: '#app',
    data() {
        return {
            menus: [
                {
                    label: '檸檬堂',
                    highlighted: 'highlighted'
                },
                {
                    label: '     '
                },
                {
                    label: '     '
                },
                {
                    label: '     '
                },
                {
                    label: 'トップ',
                    path: './top.php'
                },
                {
                    label: '商品一覧',
                    path: './shohinitirankensaku.php'
                },
                {
                    label: 'カート',
                    path: './cart.php'
                },
                {
                    label: 'ユーザー情報更新',
                    path: './user-update.php'
                },
                {
                    label: 'ログアウト',
                    path: './logout-input-user.php'
                }
            ]
        };
    }
});
