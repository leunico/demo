var $ = layui.jquery;
Vue.component('pagination', {
    template: '<nav v-if="all > 1">' +
    '<div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-1">' +
    '<a v-if="showFirst" href="javascript:void(0);" class="layui-laypage-prev" @click="changeClick(0)">上一页</a>' +
    '<template v-for="index in indexes">' +
    '<template v-if="curPage == index">' +
    '<span class="layui-laypage-curr"><em class="layui-laypage-em"></em><em>{{index}}</em></span>' +
    '</template><template v-else>' +
    '<a href="javascript:;" @click="btnClick(index)">{{index}}</a>' +
    '</template></template>' +
    '<a v-if="showLast" href="javascript:void(0);" class="layui-laypage-next" @click="changeClick(1)">' +
    '下一页</a></div></nav>',
    replace: true,
    props: ['cur', 'all', 'pageNum'],
    data: function(){
        return {
            curPage: 0,
        }
    },

    created: function(){
        this.curPage = this.cur;
    },

    watch: {
        all: function(){
            this.curPage = this.cur;
        }
    },

    methods:{
        btnClick: function(index){ // 页码点击
            if(index != this.curPage){
                this.curPage = index;
                this.$emit('page-to', this.curPage);
            }
        },
        changeClick: function(type){
            if(type == 1){
                if(this.curPage < this.all)
                    this.curPage++;
            }else{
                if(this.curPage > 0)
                    this.curPage--;
            }
            this.$emit('page-to', this.curPage);
        }
    },

    computed:{
        indexes: function(){
            var list = []; //计算左右页码
            var mid = parseInt(this.pageNum / 2); //中间值
            var left = Math.max(this.curPage - mid,1);
            var right = Math.max(this.curPage + this.pageNum - mid -1,this.pageNum);
            if (right > this.all ) { right = this.all}
            while (left <= right){
                list.push(left);
                left ++;
            }
            return list;
        },
        showLast: function(){
            return this.curPage != this.all;
        },
        showFirst: function(){
            return this.curPage != 1;
        }
    }
});