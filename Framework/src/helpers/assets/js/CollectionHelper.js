function in_array(needle, haystack, strict) {
    var found = false, key, strict = !!strict;
    for (key in haystack) {
        if ((strict && haystack[key] === needle) || (!strict && haystack[key] == needle)) {
            found = true;
            break;
        }
    }
    return found;
}
function str_replace ( search, replace, subject ) {
    if(!(replace instanceof Array)){
        replace=new Array(replace);
        if(search instanceof Array){
            while(search.length>replace.length){
                replace[replace.length]=replace[0];
            }
        }
    }
    if(!(search instanceof Array))search=new Array(search);
    while(search.length>replace.length){
        replace[replace.length]='';
    }
    if(subject instanceof Array){
        for(k in subject){
            subject[k]=str_replace(search,replace,subject[k]);
        }
        return subject;
    }
    for(var k=0; k<search.length; k++){
        var i = subject.indexOf(search[k]);
        while(i>-1){
            subject = subject.replace(search[k], replace[k]);
            i = subject.indexOf(search[k],i);
        }
    }

    return subject;

}
function CenturionCollectionHelperDecode(subject) {
    return str_replace(['{{!S!S!S!S!}}','{{!K!S!S!J!}}','{{!P!S!S!T!}}','{{!D!S!S!F!}}'],['<','>','"',"'"],subject);
}
function CenturionCollectionHelperEncode(subject) {
    return str_replace(['<','>','"',"'"],['{{!S!S!S!S!}}','{{!K!S!S!J!}}','{{!P!S!S!T!}}','{{!D!S!S!F!}}'],subject);
}
function CenturionCollectionHelperAdd(object) {
    var obj = object;
    var last_id = Number(obj.parentNode.parentNode.parentNode.getAttribute('last_id'))+1;
    var number = Number(obj.parentNode.parentNode.parentNode.getAttribute('number'));
    var count = Number(obj.parentNode.parentNode.parentNode.getAttribute('count'));
    var result = {};
    var this_id = 'id_'+number;
    result[this_id] = last_id;
    var i = number + 1;
    var counter = count;
    while (counter != 0) {
        var resp = 'id_'+i;
        result[resp]='<%='+resp+'%>';
        i++;
        counter--;
    }
    obj.parentNode.parentNode.parentNode.getElementsByClassName('box-body')[0].insertAdjacentHTML('afterBegin', JsTemplater(CenturionCollectionHelperDecode(obj.parentNode.parentNode.parentNode.childNodes[5].innerHTML),result));
    obj.parentNode.parentNode.parentNode.setAttribute('last_id', last_id)
    var re_object = obj.parentNode.parentNode.parentNode.getElementsByClassName('box-body')[0].children;

    for (var i = 0; i<re_object.length; i++){
        var in_this = re_object[i].childNodes[3].childNodes
        for (var c = 0; c < in_this.length; c++){
            if(in_array('centurion-helper-collection', in_this[c].classList)){
                in_this[c].children[2].innerHTML=CenturionCollectionHelperEncode(in_this[c].children[2].innerHTML);
            }
        }
    }

    CKEDITOR.replaceAll( 'centurion-ckeditor-classic-helper' );
}
function CenturionCollectionHelperRemove(object) {
    var obj = object;
    obj.parentNode.parentNode.parentNode.remove();
}