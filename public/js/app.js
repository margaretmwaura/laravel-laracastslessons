class Errors {

    constructor() {
        this.err = {};
    }

    get(field)
    {
        if(this.err[field])
        {
            console.log("Error","This is the error requested ");
            return this.err[field][0];

        }
    }

    record(errors)
    {
        this.err = errors
    }

    any()
    {
        return Object.keys(this.err).length > 0
    }
}

class Form {

    constructor(data) {

        this.data = data

        for(let field in data)
        {
            this[field] = data[field]
        }

        this.err = new Errors()
    }

    dataa()
    {
     let data = Object.assign({} , this);
       delete data.data;
        delete  data.err;

        return data;
    }
    reset()
    {
        for(let field in this.data)
        {
           this[field] = ' ';
        }
    }


    submit(requesttype,url)
    {
        axios[requesttype](url, this.dataa()
        ).then(this.onSucess.bind(this))
            .catch(this.onFail.bind(this))

    }

    onSucess()
    {
        alert(response.data.message);
        this.reset()
    }
    onFail(error)
    {
        this.err.record(error.response.data)
    }
}
new Vue({
    el : '#app',

    data()
    {
        return {
            skills: [],

            form: new Form({
                name: '',
                description: ' ',
            }),

        }
    },
    methods : {
            onSubmit(){


                this.form.submit('post','/projects')

            },

            
        },

        mounted()
        {
            axios.get('/skills').then(response => this.skills = response.data);
        }
   
});
