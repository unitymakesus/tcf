import React, { Component } from 'react';
import PropTypes from 'prop-types';

const WAIT_INTERVAL = 1000;
const ENTER_KEY = 13;

/**
 * Search.
 */
class Search extends Component {
  /**
   * Initialize component.
   * @param {*} props
   */
  constructor(props) {
    super(props);

    this.state = {
      search: ''
    };

    this.timer = null;
  }

  /**
   * State management event handlers.
   */
  handleSearchChange = e => {
    clearTimeout(this.timer);

    this.setState({
      search: e.target.value
    });

    this.timer = setTimeout(this.triggerChange, WAIT_INTERVAL);
  };

  handleKeyDown = e => {
    if (e.keyCode === ENTER_KEY) {
      clearTimeout(this.timer);
      this.triggerChange();
    }
  }

  triggerChange = () => {
    const { search } = this.state

    this.props.onSearch(search);
  }

  render() {
    return (
      <div className="search-wrap">
        <label id="ajax-search-label">
          Search for {this.props.category} by keyword
        </label>
        <input
          id="ajax-search"
          type="search"
          onChange={this.handleSearchChange}
          onKeyDown={this.handleKeyDown}
          value={this.state.search}
          placeholder="Start typing..."
          aria-labelledby="ajax-search-label"
          autoComplete="off"
        />
      </div>
    );
  }
}

/**
 * Props validation.
 */
Search.propTypes = {
  search: PropTypes.string,
};

export default Search;
