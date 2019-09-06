<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label1">書籍詳細</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>@{{ this.message }}</legend>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="title" class="control-label">書籍名</label>
                                    <div class="col-lg-10">
                                        @{{ detail.title }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="isbn" class="control-label">ISBN</label>
                                    <div class="col-lg-10">
                                        @{{ detail.isbn }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <img v-bind:src="detail.img" alt="Card image cap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">説明</label>
                            <div class="col-lg-10">
                                @{{ detail.description }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">所持形態</label>
                            <div class="col-lg-10">
                                <select v-model="detail.type">
                                    <option disabled value="">選択して下さい</option>
                                    @foreach (config('const.parchase_type') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="memo" class="control-label">メモ</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="textArea" v-model="detail.memo"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" v-if="submitBtn==='register'" v-on:click="register()">登録</button>
                <button type="button" class="btn btn-primary" v-if="submitBtn==='update'" v-on:click="update()">更新</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>