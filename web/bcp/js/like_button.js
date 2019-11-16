// 'use strict';

// const e = React.createElement;

// import React from 'react-dom'

export default class Feedback extends Component {
  constructor(){
    super()
    this.state = {name:'', pass:'', mail:'', comt:'', comts:[{'name':'Местный', 'comment':'Место так себе но родное'},{'name':'Приезжий', 'comment':'Как вы тут выживаете???'}], mailValid:'', nameValid:'', commValid:'', passValid:''}
    this.onNameChange = this.onNameChange.bind(this);
    this.onPassChange = this.onPassChange.bind(this);
    this.onMailChange = this.onMailChange.bind(this);
    this.onComtChange = this.onComtChange.bind(this);
    this.onComtChange = this.onComtChange.bind(this);
    this.submit = this.submit.bind(this);
    this.validateName = this.validateName.bind(this)
    this.validatePass = this.validatePass.bind(this)
    this.validateEmail = this.validateEmail.bind(this)
    this.validateComt = this.validateComt.bind(this)
    var nameIsValid = this.validateName();
    var passIsValid = this.validatePass();
    var emailIsValid = this.validateEmail();
    var comtIsValid = this.validateComt();
  }


  onNameChange(e){
    var value = e.target.value;
    var validName = this.validateName(value);
    this.setState({name: value, nameValid: validName});
    // console.log(this.state.name);
  }

  onPassChange(e){
    var value = e.target.value;
    var validName = this.validatePass(value);
    this.setState({pass: value, passValid: validName});
    // console.log(this.state.name);
  }

  onMailChange(e){
    var value = e.target.value;
    var valid = this.validateEmail(value);
    this.setState({mail: value, mailValid: valid});
    // console.log(this.state.comment);
  }

  onComtChange(e){
    var value = e.target.value;
    var valid = this.validateComt(value);
    this.setState({comt: value, comtValid: valid});
    // console.log(this.state.comment);
  }

  validateName(some){
    var regExp = /^[a-zA-Z0-9]{4,}([._]?[a-zA-Z0-9]+)*$/;
    return regExp.test(String(some).toLowerCase());
  }

  validatePass(some){
    var regExp = /^[a-zA-Z0-9]{4,}([._]?[a-zA-Z0-9]+)*$/;
    return regExp.test(String(some).toLowerCase());
  }

  validateEmail(some){
    var regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regExp.test(String(some).toLowerCase());
  }

  validateComt(some){
    if (String(some).length>2) {
      return true
    } else {
      return false
    }
  }


  submit(e){
    e.preventDefault()
    if (this.state.nameValid) {
      if (this.state.passValid) {
        if (this.state.mailValid) {
          if (this.state.comtValid) {

            var {name, comt} = this.state;
            var newArray = this.state.comts;
            newArray.push({'name':name,'comment':comt});
            this.setState({name:'', pass:'', mail:'', comt:'', mailValid:'', nameValid:'', comtValid:'', passValid:'', comts:newArray})


          } else {
            alert('Comment is empty!')
          }
        } else {
          (alert('Wrong Mail!'))
        }
      } else {
        alert('Wrong Password!')
      }
    } else {
      (alert('Wrong Name!'))
    }
  }


  render(){
    var nameColor = this.state.nameValid===true?"green":"red";
    var mailColor = this.state.mailValid===true?"green":"red";
    var comtColor = this.state.comtValid===true?"green":"red";
    var passColor = this.state.passValid===true?"green":"red";

    var arr = this.state.comts
    var items = arr.map((value, index)=>{
      return (
          <div key={index}><p className="d-inline">{index+1}. </p><h5 className="d-inline" style={{color:'grey'}}>{value.name}</h5><h5>{value.comment}</h5></div>
      )
    })

    return e(
        <div className="row mt-0">
          <div className="col-sm-3">
            <form className="mx-auto" onSubmit={this.submit}>
              <div className="form-group">
                <div className="">
                  <label >Имя пользователя:
                    <input className="form-control" value={this.state.name} placeholder="Username" onChange={this.onNameChange} style={{borderColor:nameColor}}></input>
                  </label>
                </div>
                <div className="">
                  <label >Пароль:
                    <input className="form-control" value={this.state.pass} placeholder="Password" onChange={this.onPassChange} style={{borderColor:passColor}} type="password"></input>
                  </label>
                </div>
                <div className="">
                  <label >Е-мейл:
                    <input className="form-control" value={this.state.mail} placeholder="Email"onChange={this.onMailChange} style={{borderColor:mailColor}}></input>
                  </label>
                </div>
                <div className="">
                  <label >Комментарий:
                    <textarea className="form-control" type="text" value={this.state.comt} placeholder="Comment..." onChange={this.onComtChange}  style={{borderColor:comtColor}}></textarea>
                  </label>
                </div>
              </div>
              <button type="submit" className="btn btn-primary w-100">Отправить</button>
            </form>
          </div>
          <div className="col-sm-8">
            <div><p>Оставьте и вы свой комментарий...</p></div>
            <div className="text-right"> {items} </div>
          </div>
        </div>
    )

  }
}

// export default Feedback;

const domContainer = document.querySelector('#like_button_container');
ReactDOM.render(React.createElement(Feedback), domContainer);

// const e = React.createElement;
//
// class LikeButton extends React.Component {
//   constructor(props) {
//     super(props);
//     this.state = { liked: false };
//   }
//
//   render() {
//     if (this.state.liked) {
//       return 'You liked this.';
//     }
//
//     return e(
//       'button',
//       { onClick: () => this.setState({ liked: true }) },
//       'Like'
//     );
//   }
// }
//
// const domContainer = document.querySelector('#like_button_container');
// ReactDOM.render(e(LikeButton), domContainer);