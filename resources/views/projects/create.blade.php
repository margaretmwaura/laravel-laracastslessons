<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div id="app">
    <form method="POST" action="/projects" @submit.prevent="onSubmit">
        <div class="form-group">
            <label for="name">Project name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" v-model="form.name" >
            <small id="name" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <p v-text="form.err.get('name')"></p>
        </div>
        <div class="form-group">
            <label for="description">Project descritption</label>
            <input type="text" class="form-control" id="description" placeholder="Enter the description" v-model="form.description" >
            <p v-text="form.err.get('description')"></p>
        </div>
        <button type="submit" class="btn btn-primary" :disabled="form.err.any()">Submit</button>
    </form>
</div>

<script src="https://unpkg.com/vue@2.6.11/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
