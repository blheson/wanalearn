const helper = {
  sort_btn: (btn, message, disabled = true) => {
    btn.innerHTML = message
    btn.disabled = disabled
    btn.style.cssText = `cursor:' ${disabled ? 'not-allowed' : 'pointer'}`
  },
  show_thankyou: function (id, type = 'bank_transfer') {
    document.getElementById('thank_you').style.display = 'block'
    document.getElementById('order_processing').style.display = 'none'
    id = id.toString();
    document.querySelector('.order_id').innerText = id.padStart(5, 0);
    document.querySelector('.payment_details_section').style.opacity = '1'
    switch (type) {
      case 'bank_transfer':
        this.paintBankTransferInfo()
        break;
      case 'flutterwave':
        this.paintFlutterwaveInfo(id)
        break;
      default:
        break;
    }
  },
  show_error: function (message) {
    document.querySelector('.log-notification').innerText = message
  },
  paintBankTransferInfo: function () {
    document.querySelector('#thank_you_info').innerHTML = `<div id="bank_transfer_info"> <div> <p> You can make payment through: </p> <ul class="account"> <li> Account Number: 4600104655 </li> <li> Account Name: Wanalearn Academy </li> <li> Bank name: VBank (VFD Microfinance Bank).</li> </ul> </div><div><h4 class="text-center" style="padding-top:10px;font-weight: 600;">What You Should Do After Payment</h4> <ol> <li>Make Payment</li> <li>Fill <a href="https://docs.google.com/forms/d/1rWFPbaTDDzR3IBUiySoj-Kh6_VnjW3ceDUVlQWo4OkQ">Payment Form</a></li></ol></div></div>`
  },
  paintFlutterwaveInfo: function (order_id) {
    let site_url = document.querySelector('input[name=site_url]').value
    document.querySelector('#thank_you_info').innerHTML = `<div id="flutter_wave_info"> <p>Kindly <a href="${site_url}/account?order_id=${order_id}" class="login_after_payment" target="_blank">login/register</a> to get access to your course</p><p>Please, keep the Order id saved somewhere. </p></div>`
  },
  setUpListener: () => {
    if (document.getElementById('signin')) {
      document.querySelector('.create').addEventListener('click', () => {
        console.log('create');
        document.getElementById('signin').style.display = 'none'
        document.getElementById('register').style.display = ''
      })
      document.querySelector('.login').addEventListener('click', () => {
        document.getElementById('signin').style.display = ''
        document.getElementById('register').style.display = 'none'
      })
    }

  }
  ,
  control: {
    init: function () {
      helper.setUpListener();
    }
  }
}
const middleware = {
  createInfoDom: function () {
    let div = document.createElement('div')
    div.classList.add('info-to-product')
    document.body.appendChild(div)
    return div
  },
  checkCurrentInfoBox: function () {
    let v = document.querySelector('.pop-info-box-product');
    if (v)
      this.removeDom(v)
  },
  showPop: function (info, status, clear = true) {
    dom = this.createInfoDom();
    dom.innerText = info;

    dom.classList.add('pop-info-box-product', status);
    if (clear)
      dom.classList.add('fadeOut');
    dom.style.cssText = `left:calc(50% - ${dom.offsetWidth / 2}px);`

    return dom;
  },
  info: function (info, status = 'error', clear = true) {
    this.checkCurrentInfoBox();
    let dom = this.showPop(info, status, clear);
    if (clear)
      this.clear(dom, status);
  },
  clear: function (dom, status) {
    setTimeout(() => {
      dom.classList.remove('fadeOut', status);
      this.checkCurrentInfoBox()
    }, 2500);
  },
  removeDom: function (dom) {
    dom.remove();
  }
}

helper.control.init();
