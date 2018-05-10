import React from 'react';

export default class ContactType extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      types: []
    };
  }
  componentDidMount() {
    /* fetch API in action */
    fetch('/api/civicrm/contact/type')
      .then(response => {
        console.log(response);
        return response.json();
      })
      .then(json => {
        //Fetched types is stored in the state
        this.setState({ 
          types: json.results 
        });
      });
  }
  render() {
    return (
      <div>
        <select>
        </select>
      </div>
    );
  }
}