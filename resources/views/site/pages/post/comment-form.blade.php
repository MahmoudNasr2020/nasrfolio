@auth
    <div class="col-12 mb-5" id="div-comment" >
        <div class="feedback mt-3php artisnaser" style="display: block;margin: auto;">
            <form id="form-comment">
                <div class="row">
                    <div class="col-12 ml-2">
                        <textarea class="form-control" placeholder="اكتب تعليقك" rows="4" name="comment" id="comment"></textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ \Illuminate\Support\Facades\Crypt::encryptString($post->id) }}">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success mt-3" id="btn-submit" >حفظ</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endauth

@guest
    <div class="col-12 mb-4">
      <span style="background-color: silver;">
        !!يجب عليك تسجيل الدخول لكتابة تعليقك!!
      </span>

    </div>
@endguest
