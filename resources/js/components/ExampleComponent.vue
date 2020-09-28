<template>
    <div>
        <hr>
        <div class="row">
            <!--            <div class="form-group col-md-3">-->
            <!--                <label class="col-sm-9 control-label">دسته بندی منو</label>-->
            <!--                <select class="form-control" name="navcategory">-->
            <!--                    <option v-for="navcategory in navcategories" :value="navcategory.id">{{navcategory.title}}</option>-->
            <!--                </select>-->
            <!--            </div>-->
            <!--            <div class="form-group col-md-3">-->
            <!--                <label class="col-sm-9 control-label">دسته بندی اصلی</label>-->
            <!--                <select class="form-control" name="maincategory" v-model="maincategories_select"-->
            <!--                        @change="mainchange($event)">-->
            <!--                    <option v-for="maincategoy in maincategories" :value="maincategoy.id">{{maincategoy.title}}</option>-->
            <!--                </select>-->
            <!--            </div>-->
            <!--            <div class="form-group col-md-3">-->
            <!--                <label class="col-sm-9 control-label">دسته بندی فرعی</label>-->
            <!--                <select class="form-control" name="subcategory" v-model="subcategories_select"-->
            <!--                        @change="subchange($event)">-->
            <!--                    <option value="0">هیچ کدام</option>-->
            <!--                    <option v-for="subcategory in subcategories" :value="subcategory.id">{{subcategory.title}}</option>-->
            <!--                </select>-->
            <!--            </div>-->

            <div class="form-group col-md-3">
                <label class="col-sm-9 control-label">دسته بندی </label>
                <select class="form-control " name="maincategory" v-model="maincategories_select"
                        @change="mainchange($event)">
                    <option v-if="pro" v-for="maincategoy in maincategories"
                            :select="maincategories_select.toString() === maincategoy.id" :value="maincategoy.id">{{
                        maincategoy.title }}
                    </option>
                    <option v-if="!pro" v-for="maincategoy in maincategories" :value="maincategoy.id">{{
                        maincategoy.title }}
                    </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div v-if="flag">
                <div class="form-group col-md-2" v-for="attribute in attributes">
                    <label>ویژگی {{attribute.title}}</label>
                    <select name="attributes[]" class="form-control">
                        <option v-for="attributevalues in attribute.attributevalue" :value="attributevalues.id">
                            {{attributevalues.title}}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                // navcategories: [],
                // subcategories: [],
                // subcategories_select: '',
                maincategories_select: [],
                maincategories: [],
                flag: false,
                attributes: []
            }
        },
        props: ['product', 'pro'],
        mounted() {
            axios.get('/api/categories').then(
                res => {
                    // this.navcategories = res.data.navcategories,
                    //     this.maincategories = res.data.maincategories,
                    //     this.subcategories = res.data.subcategories
                    this.maincategories = res.data.categories
                }).catch(err => {
                console.log(err)
            })
            if (this.pro) {
                for (var i = 0; i < this.pro.categories.length; i++) {
                    this.maincategories_select.push(this.pro.categories[i].id);
                }
                this.mainchange();
            }
        },
        methods: {
            mainchange() {
                axios.post('/api/categories/attribute', this.maincategories_select).then(res => {
                    this.flag = true;
                    this.attributes = res.data.attributes;
                }).catch(err => {
                    console.log(err)
                    this.flag = false;
                })
            },
            // subchange(event) {
            //     console.log(this.subcategories_select);
            //     axios.post('/api/categories/attribute', this.subcategories_select).then(res => {
            //         console.log(res.data.attributes);
            //         this.flag = true;
            //         this.attributes = res.data.attributes;
            //     }).catch(err => {
            //         console.log(err)
            //         this.flag = false;
            //     })
            // }
        },

    }
</script>
