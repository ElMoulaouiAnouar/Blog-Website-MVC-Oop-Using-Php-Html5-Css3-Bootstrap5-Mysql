document.querySelectorAll('.btn-edit').forEach(function(btn){
    btn.addEventListener("click",function(){
        var form = document.createElement("form");
        form.method = "POST";
        var div = document.createElement('div');
        div.className="form-floating";
        var text = document.createElement('textarea');
        text.style = "height:100px";
        text.name="Editcomment";
        text.id="loatingTextarea2";
        text.className="form-control";
        var lbl = document.createElement('label');
        lbl.id="floatingTextarea2";
        lbl.textContent="Edit Comments";
        div.appendChild(text);
        div.appendChild(lbl);
        var id_comment = document.createElement('input');
        id_comment.type = "hidden";
        id_comment.name = "id_comment";
        id_comment.value = this.getAttribute('id');
        var button = document.createElement("button");
        button.type = "submit";
        button.textContent = "save";
        button.name = "btn_update";
        button.className = "btn btn-sm btn-success m-1";
        div.appendChild(button);
        div.appendChild(id_comment);
        form.appendChild(div);
        var p = this.parentNode.parentNode.parentNode.childNodes[3];
        text.textContent = p.textContent;
        p.textContent = "";
        p.appendChild(form);
        this.style="display:none";
        
    });
});