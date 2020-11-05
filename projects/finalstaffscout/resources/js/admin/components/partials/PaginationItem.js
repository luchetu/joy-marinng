import React from 'react';


class PaginationItem extends React.Component {

    constructor(props)
    {
        super(props);
    }

    paginate(e) {
        e.preventDefault();

        this.props.onclick(this.props.page);
    }

    render() {
        return this.props.show ? (
            <li className={this.props.active ? 'active' : ''}>
                <a href="#" onClick={this.paginate.bind(this) }>{this.props.title}</a>
            </li>
        ) : null;
    }
}

export default PaginationItem