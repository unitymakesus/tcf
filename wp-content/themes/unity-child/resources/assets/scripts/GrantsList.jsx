import React, { Component, Fragment } from 'react';
import { render } from 'react-dom';
import axios from 'axios';
import Table from './components/Table';

class GrantsList extends Component {
  constructor(props) {
    super(props);

    const headers = {
      scholarships: [
        ['title', 'Scholarships'],
        ['eligibility', 'Eligibility'],
        ['amount', 'Amount']
      ],
      grants: [
        ['title', 'Grants'],
        ['eligibility', 'Description'],
        ['amount', 'Amount']
      ],
    };

    this.state = {
      hasError: false,
      headers: headers[params.award_category],
      isLoading: false,
      rows: [],
      sortedBy: null,
      sortDir: 'none',
    };

    this.handleTableSort = this.handleTableSort.bind(this);
  }

  /**
   * Retrieve data from WP REST API endpoint.
   * (params is set in blade template)
   */
  fetchGrants() {
    this.setState({
      isLoading: true,
    });

    axios
      .get('/wp-json/tcf/v1/awards', {
        params: params,
      })
      .then(({ data }) => {
        this.setState({ rows: data });
      })
      .catch(error => {
        this.setState({ hasError: true });
        console.log(error);
      })
      .finally(() => {
        this.setState({ isLoading: false });
      });
  }

  handleTableSort(header) {
    let sortDir;
    let ascending = this.state.sortDir === 'ascending';
    if (header === this.state.sortedBy) {
      sortDir = !ascending ? 'ascending' : 'descending';
    } else {
      sortDir = 'ascending';
    }

    this.setState(prevState => ({
      rows: prevState.rows.slice(0).sort((a, b) => {
        if (this.state.sortDir === 'ascending') {
          return a[header] > b[header] ? 1 : a[header] < b[header] ? -1 : 0;
        } else {
          return a[header] < b[header] ? 1 : a[header] > b[header] ? -1 : 0;
        }
      }),
      sortedBy: header,
      sortDir: sortDir
    }));
  }

  /**
   * Fetches grant data for initial render.
   */
  componentDidMount() {
    this.fetchGrants();
  }

  render() {
    let { headers, rows, sortDir, sortedBy } = this.state;

    return (
      <Fragment>
        <Table
          headers={headers}
          rows={rows}
          sortDir={sortDir}
          sortedBy={sortedBy}
          handleTableSort={this.handleTableSort}
        />
      </Fragment>
    );
  }
}

render(<GrantsList />, document.getElementById('root'));
