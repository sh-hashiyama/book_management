const app = new Vue({
    el: '#app',
    data: {
        message: '',
        submitBtn: 'update',
        books: [],
        detail: {
            title: '',
            description: '',
            isbn: '',
            type: '',
            img: '',
        },
        status: '',
        loading: false,
    },
    created: function () {
        this.loading = true
        axios.get('/api/book')
            .then((res) => {
                this.loading = false
                this.books = res.data
            })
            .catch(err => {
                this.loading = false
                this.status = 'getError'
            })
    },
    methods: {
        showDetail: function (book) {
            this.detail = {
                title: book.title,
                description: '',
                isbn: book.isbn,
                img: book.image_url,
                type: book.pivot.type,
                memo: book.pivot.memo
            }
        },
        update: function () {
            this.detail._method = 'PATCH'
            const axiosPost = axios.create({
                xsrfHeaderName: "X-XSRF-TOKEN",
                withCredentials: true
            })

            axiosPost.post('/api/book/update', this.detail)
                .then((res) => {
                    this.alertStatus = 'success'
                    $('#modal1').modal('hide');
                }).catch(err => {
                    this.alertStatus = 'error'
                    console.log(err.response)
                    $('#modal1').modal('hide');
                })
        }
    }
})
