const app = new Vue({
    el: '#app',
    data: {
        message: '',
        keyword: '',
        submitBtn: 'none',
        results: [],
        detail: {
            title: '',
            isbn: '',
            img: '',
            description: '',
            publishDate: '',
            type: '',
        },
        alertStatus: '',
        loading: false,
        validationErrors: [],
    },
    methods: {
        getBooks() {
            this.results = []
            this.loading = true
            axios.get('/api/book/search?keyword=' + this.keyword)
                .then((res) => {
                    this.results = res.data.Items
                    this.loading = false
                })
                .catch(err => {
                    console.log(err)
                })
        },
        showDetail: function (item) {
            this.alertStatus = ''
            this.detail = {
                title: item.title,
                isbn: item.isbn,
                img: item.mediumImageUrl,
                description: item.itemCaption,
                publishDate: item.publishDate,
                type: '',
                memo: '',
            }
            axios.get('/api/book/isRegistered/' + item.isbn)
                .then((res) => {
                    if (res.data.isRegistered) {
                        this.message = '既に登録されている書籍です。'
                        this.submitBtn = 'none'
                    } else {
                        this.message = '以下の書籍を登録します。'
                        this.submitBtn = 'register'
                    }
                })
                .catch(err => {
                    console.log(err)
                })
        },
        register: function () {
            const axiosPost = axios.create({
                xsrfHeaderName: "X-XSRF-TOKEN",
                withCredentials: true
            })

            axiosPost.post('/api/book/register', this.detail)
                .then((res) => {
                    this.alertStatus = 'success'
                    $('#modal1').modal('hide');
                }).catch(err => {
                    this.alertStatus = 'error'
                    console.log(err.response)
                    $('#modal1').modal('hide');
                })
        },
    }
})
