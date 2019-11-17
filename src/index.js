import React from "react";
import ReactDOM from "react-dom";

class Feedback extends React.Component {
    constructor(){
        super()
        this.state = {
            name:'',
            // pass:'',
            mail:'',
            comt:'',
            comts:[{'name':'Местный', 'comment':'Место так себе но родное'},{'name':'Приезжий', 'comment':'Как вы тут выживаете???'}],
            mailValid:'',
            nameValid:'',
            commValid:'',
            // passValid:'',
            data: [],
            isLoading: false,
        }


        this.onNameChange = this.onNameChange.bind(this);
        // this.onPassChange = this.onPassChange.bind(this);
        this.onMailChange = this.onMailChange.bind(this);
        this.onComtChange = this.onComtChange.bind(this);
        this.onComtChange = this.onComtChange.bind(this);
        this.submit = this.submit.bind(this);
        this.validateName = this.validateName.bind(this)
        // this.validatePass = this.validatePass.bind(this)
        this.validateEmail = this.validateEmail.bind(this)
        this.validateComt = this.validateComt.bind(this)
        var nameIsValid = this.validateName();
        // var passIsValid = this.validatePass();
        var emailIsValid = this.validateEmail();
        var comtIsValid = this.validateComt();
    }

    componentDidMount() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/comments/comment', true); // замените адрес
        xhr.send();
        this.setState({ isLoading: true })

        xhr.onreadystatechange = () => {
            if (xhr.readyState !== 4) {
                return false
            }
            if (xhr.status !== 200) {
                console.log(xhr.status + ': ' + xhr.statusText)
            } else {
                this.setState({
                    data: JSON.parse(xhr.responseText),
                    isLoading: false,
                })
                console.log(this.state.data)
            }
        }
    }


    onNameChange(e){
        var value = e.target.value;
        var validName = this.validateName(value);
        this.setState({name: value, nameValid: validName});
        // console.log(this.state.name);
    }

    // onPassChange(e){
    //     var value = e.target.value;
    //     var validName = this.validatePass(value);
    //     this.setState({pass: value, passValid: validName});
    //     // console.log(this.state.name);
    // }

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
        var regExp = /^[a-zA-Z0-9а-яА-Я]{4,}([._]?[a-zA-Z0-9]+)*$/;
        return regExp.test(String(some).toLowerCase());
    }

    // validatePass(some){
    //     var regExp = /^[a-zA-Z0-9]{4,}([._]?[a-zA-Z0-9]+)*$/;
    //     return regExp.test(String(some).toLowerCase());
    // }

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
            // if (this.state.passValid) {
                if (this.state.mailValid) {
                    if (this.state.comtValid) {
                        var nameSet = this.state.name;
                        var mailSet = this.state.mail;
                        var comtSet = this.state.comt;
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "/comments/comment");
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.send('name='+nameSet+'&comt='+comtSet+'&mail='+mailSet);

                        this.setState({ isLoading: true })

                        xhr.onreadystatechange = () => {
                            if (xhr.readyState !== 4) {
                                return false
                            }
                            if (xhr.status !== 200) {
                                console.log(xhr.status + ': ' + xhr.statusText)
                            } else {
                                this.setState({
                                    data: JSON.parse(xhr.responseText),
                                    isLoading: false,
                                })
                                console.log(this.state.data)
                            }
                        }
                    } else {
                        alert('Comment is empty!')
                    }
                } else {
                    (alert('Wrong Mail!'))
                }
            // } else {
            //     alert('Wrong Password!')
            // }
        } else {
            (alert('Wrong Name!'))
        }
    }


    render(){
        var nameColor = this.state.nameValid===true?"green":"red";
        var mailColor = this.state.mailValid===true?"green":"red";
        var comtColor = this.state.comtValid===true?"green":"red";
        // var passColor = this.state.passValid===true?"green":"red";

        // var arr = this.state.comts
        var arr = this.state.data;
        var items = arr.map((value, index)=>{
            return (<div key={index}><p className="d-inline">
                {/*{index+1}. */}
            </p><h5 className="d-inline" style={{color:'black'}}>{value.name}</h5>
                <p>{value.comment}</p>
            </div>)
        })

        return(
            <div className="row mt-2">
                    <div class="col-12"><h5 class=" text-right">Оставьте и Вы свой комментарий...</h5></div>
                <div className="col-sm-12 col-md-6">
                    <div className="text-right"> {items} </div>
                </div>
                <div className="col-sm-12 col-md-6">
                    <form className="" onSubmit={this.submit}>
                        <div className="form-group">
                            <div className="my-2">
                                    <input className="form-control" value={this.state.name} placeholder="Имя" onChange={this.onNameChange} style={{borderColor:nameColor}}></input>
                            </div>
                            <div className="my-2">
                                    <input className="form-control" value={this.state.mail} placeholder="E-mail"onChange={this.onMailChange} style={{borderColor:mailColor}}></input>
                            </div>
                            <div className="my-2">
                                    <textarea className="form-control" type="text" value={this.state.comt} placeholder="Комментарий..." onChange={this.onComtChange}  style={{borderColor:comtColor}}></textarea>
                            </div>
                        </div>
                        <button type="submit" className="btn btn-primary w-100">Отправить</button>
                    </form>
                </div>
            </div>
        )

    }
}

export default Feedback;


ReactDOM.render(<Feedback />, document.getElementById("root"));