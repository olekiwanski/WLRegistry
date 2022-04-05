<?php


namespace WLRegistryAPI;

/**
 * Repository: https://github.com/olekiwanski/wlregistry
 * Official api reference: https://wl-api.mf.gov.pl
 */
class WLRegistry
{

    const API_DOMAIN = "https://wl-api.mf.gov.pl";
    protected $date;


    public function __construct()
    {
        $this->date = date('Y-m-d');
    }

    /**
     * @param string $nip
     * @return Result|ErrorResponse
     */
    public function searchSingleSubjectByNip(string $nip)
    {
        $response = $this->_request(
            '/api/search/nip/' . $nip . '/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultSingle($subject_data['result']);

    }

    /**
     * @param string $nips
     * @return Result|ErrorResponse
     */
    public function searchSubjectsByNips(string $nips)
    {
        $response = $this->_request(
            '/api/search/nips/' . $nips . '/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultEntries($subject_data['result']);

    }

    /**
     * @param string $bank_account
     * @return Result|ErrorResponse
     */
    public function searchSingleSubjectByBankAccount(string $bank_account)
    {
        $response = $this->_request(
            '/api/search/bank-account/' . $bank_account . '/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultMulti($subject_data['result']);
    }

    /**
     * @param string $bank_accounts
     * @return Result|ErrorResponse
     */
    public function searchSubjectsByBankAccounts(string $bank_accounts)
    {
        $response = $this->_request(
            '/api/search/bank-accounts/' . $bank_accounts . '/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultEntries($subject_data['result']);
    }

    /**
     * @param string $nip
     * @param string $bank_accounts
     * @return Result|ErrorResponse
     */
    public function checkSingleSubjectByNipAndBankAccounts(string $nip, string $bank_accounts)
    {
        $response = $this->_request(
            '/api/check/nip/' . $nip . '/bank-account/' . $bank_accounts, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultCheck($subject_data['result']);
    }

    /**
     * @param string $regon
     * @param string $bank_accounts
     * @return Result|ErrorResponse
     */
    public function checkSingleSubjectByRegonAndBankAccounts(string $regon, string $bank_accounts)
    {
        $response = $this->_request(
            '/api/check/regon/' . $regon . '/bank-account/' . $bank_accounts, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultCheck($subject_data['result']);
    }

    /**
     * @param string $regon
     * @return Result|ErrorResponse
     */
    public function searchSingleSubjectByRegon(string $regon)
    {
        $response = $this->_request(
            '/api/search/regon/' . $regon, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultSingle($subject_data['result']);
    }

    /**
     * @param string $regons
     * @return Result|ErrorResponse
     */
    public function searchSubjectsByRegons(string $regons)
    {
        $response = $this->_request(
            '/api/search/regons/' . $regons, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultEntries($subject_data['result']);
    }

    /**
     * @return false|string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param false|string $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }


    /**
     * @param $path
     * @param $params
     * @return bool|string
     */
    private function _request($path, $params)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::API_DOMAIN . $path . '?' . http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}