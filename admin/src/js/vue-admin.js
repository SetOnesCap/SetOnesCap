new Vue({
    el: '#admin',
    data: {
        activePage: 'posts',
        tracks: tracks,
        posts: posts,
        pages:[
            {
                title: 'Posts',
                id: 'posts'
            },
            {
                title: 'Tracks',
                id: 'tracks'
            },
            {
                title: 'Settings',
                id: 'settings'
            }
        ]
    }
})